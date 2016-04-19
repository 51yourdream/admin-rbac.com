<?php

namespace App\Http\Controllers\Admin;

use App\Events\ServerCreated;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Log;
use Toastr,Breadcrumbs;
use App\Models\Goods;
use Illuminate\Support\Facades\Input;
use Helper;

class GoodsController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        Breadcrumbs::setView('admin._partials.breadcrumbs');
        Breadcrumbs::register('admin-goods',function($breadcrumbs){
            $breadcrumbs->parent('dashboard');
            $breadcrumbs->push('商品管理', route('admin.goods.index'));
        });

    }

    public function index(Request $request)
    {
        Breadcrumbs::register('admin-goods-index', function ($breadcrumbs) {
            $breadcrumbs->parent('admin-goods');
            $breadcrumbs->push('商品列表', route('admin.goods.index'));
        });
        $parameters = $request->all();
        $goods_model = new Goods();
        extract($parameters);
        $flag=true; //用来标识是否走默认排序
        foreach($parameters as $key=>$value){
            if($key=='title' && !empty($title)){
                $flag=false;
                $goods_model = $goods_model->where('title','like',"%{$title}%");
            }
            if($key=='created_at_from' && !empty($created_at_from)){
                $flag=false;
                $goods_model = $goods_model->where('created_at','>=',"{$created_at_from}");
            }
            if($key=='created_at_to' && !empty($created_at_to)){
                $flag=false;
                $goods_model = $goods_model->where('created_at','<=',"{$created_at_to}");
            }
            if($key=='id_sort' && !empty($id_sort)){
                $flag=false;
                $goods_model = $goods_model->orderBy('id',$id_sort);
            }
            if($key=='price_sort' && !empty($price_sort)){
                $flag=false;
                $goods_model = $goods_model->orderBy('price',$price_sort);
            }
            if($key=='stocks_sort' && !empty($stocks_sort)){
                $flag=false;
                $goods_model = $goods_model->orderBy('stocks',$stocks_sort);
            }
            if($key=='salenum_sort' && !empty($salenum_sort)){
                $flag=false;
                $goods_model = $goods_model->orderBy('salenum',$salenum_sort);
            }
            if($key=='created_at_sort' && !empty($created_at_sort)){
                $flag=false;
                $goods_model = $goods_model->orderBy('created_at',$created_at_sort);
            }
        }
        if($flag){ //默认以id排序
            $goods_model = $goods_model->orderBy('id','DESC');
        }
        if(!isset($pageSize) && empty($pageSize)){
            $pageSize = Config::get('app.pageSize');
        }
        Log::info($pageSize);
        $goods = $goods_model->paginate($pageSize);
        return view('admin.goods.index')->withGoods($goods)->withParameters($parameters);
    }

    public function create(){
        Breadcrumbs::register('admin-goods-create', function ($breadcrumbs) {
            $breadcrumbs->parent('admin-goods');
            $breadcrumbs->push('添加商品', route('admin.goods.create'));
        });
        return view('admin.goods.create');
    }

    public function store(Requests\Admin\Goods\StoreGoodsPostRequest $request)
    {
        $file = $request->file('pic');
        $res = Helper::fileUpload($file);
        if($res['code']!=200){
            Toastr::error($res['msg']);
            return redirect(url('admin.goods.create'));
        }
        $form_data = Input::all();
        $form_data['pic'] = $res['filename'];
        $result = Goods::create($form_data);
        if($result){
            Toastr::success('商品添加成功!');
            return redirect('admin/goods');
        }else{
            Toastr::error('商品添加失败!');
            return redirect('admin/goods/create');
        }
    }

    public function edit($id)
    {
        Breadcrumbs::register('admin-goods-edit', function ($breadcrumbs) use ($id) {
            $breadcrumbs->parent('admin-goods');
            $breadcrumbs->push('修改商品', route('admin.goods.edit', ['id' => $id]));
        });
        $goods = Goods::find($id);

        Event::fire(new ServerCreated($goods)); //出发事件

        return view('admin.goods.edit')->withGoods($goods);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $pic = Goods::find($id)->pic;
        $result = Goods::destroy($id);
        if($result){
            @unlink($pic);
        }
        return response()->json($result ? ['status' => 1,'msg'=>'删除成功!'] : ['status' => 0,'msg'=>'删除失败!']);
    }
}
