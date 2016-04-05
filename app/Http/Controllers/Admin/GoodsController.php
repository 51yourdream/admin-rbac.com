<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;
use Toastr,Breadcrumbs;
use App\Models\Goods;

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
        echo '添加商品';
    }
}
