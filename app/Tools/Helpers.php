<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/3/18
 * Time: 11:55
 */
use \Auth,\Route;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Config;

class Helper
{
    /**
     * @param $route
     * @return bool
     */
    /*用于模板中来检测连接显不显示*/
    public static function checkPermission($route)
    {
        if(Auth::guard('admin')->user()->is_super || Auth::guard('admin')->user()->can($route)){
            return true;
        }else{
            return false;
        }
    }
    public static function sort($sort_name,$sort)
    {
        $str = '?';
        $parameters = Request::all();
        foreach($parameters as $key=>$value){
            if($key!='page' && $key!=$sort_name){
                $str .=$key.'='.$value.'&';
            }
        }
        return $str.$sort_name.'='.$sort;
    }

    /**
     * @param int $space 步长
     * @param int $num   下拉数量
     * @return string
     */
    public static function page_size_select($space=10,$num=5)
    {
        $select = '';
        $pageSize = Config::get('app.pageSize');
        $parameters = Request::all();
        if(isset($parameters['pageSize']) && in_array($parameters['pageSize'],range($space,$space*$num))){
            for($i=1;$i<=$num;$i++){
                if($parameters['pageSize'] == $space*$i){
                    $select .="<option value={$parameters['pageSize']} selected=\"selected\">{$parameters['pageSize']}</option>";
                }else{
                    $select .="<option value=". $space*$i." >". $space*$i."</option>";
                }
            }
        }elseif(in_array($pageSize,range($space,$space*$num))){
            for($i=1; $i<=$num; $i++){
                if($pageSize == $space*$i){
                    $select .="<option value={$pageSize} selected=\"selected\">{$pageSize}</option>";
                }else{
                    $select .="<option value=".$space*$i.">".$space*$i."</option>";
                }
            }
        }else{
            if(!empty($pageSize) && $pageSize < $space){
                $select .= "<option value={$pageSize} selected=\"selected\">{$pageSize}</option>";
                for($i=1; $i<=$num; $i++){
                        $select .= "<option value=".$space*$i." >".$space*$i."</option>";
                }
            }
            if(!empty($pageSize) && $pageSize > $space*$num){
                for($i=1; $i <= $num; $i++){
                    $select .= "<option value=".$space*$i." >".$space*$i."</option>";
                }
                $select .= "<option value={$pageSize} selected=\"selected\">{$pageSize}</option>";
            }
            if(empty($pageSize)){
                for($i=1; $i <= $num; $i++){
                    if($i==1){
                        $select .= "<option value=".$space*$i." selected='selected' >".$space*$i."</option>";
                    }else{
                        $select .= "<option value=".$space*$i." >".$space*$i."</option>";
                    }

                }
            }
        }
        return $select;
    }

    public static function fileUpload($file,$ispic=true)
    {
        // Determining If An Uploaded File Is Valid
        if ($file->isValid()){
            $filename = $file->getFilename();
            $originalName = $file->getClientOriginalName(); //原始名称
            $filesize = $file->getClientSize(); //获取文件大小
            $fileMimeType = $file->getClientMimeType();
            $fileExtension = $file->guessClientExtension();
            $fileRealpath = $file->getRealPath();
            if($ispic){
                $extension_arr = Config::get('fileUpload.pic.extension');
                $permission_size = Config::get('fileUpload.pic.size');
                if(!in_array(strtolower($fileExtension),$extension_arr)){
                    $res = [
                        'code'=>100,
                        'msg'=>'该图片类型不允许，支持(jpg,jpeg,png,gif)'
                    ];
                    return $res;
                }
                if($filesize > $permission_size){
                    $res = [
                        'code'=>101,
                        'msg'=>'图片太大，最大支持5M'
                    ];
                    return $res;
                }
                $newfilename = time().rand(9999,1000).'.'.$fileExtension;
                $savepath = 'pic/'.date('Ymd');
                $file->move($savepath,$newfilename); //第一个参数是存储文件路径 第二个参数是新的文件名
                $res = [
                    'code'=>'200',
                    'msg'=>'上传成功',
                    'filename'=> $savepath.'/'.$newfilename,
                ];
                return $res;
            }
        }else{
            $error = $file->getError();
            $res = [
                'code'=>$error,
                'msg'=>'未知错误'
            ];
            return $res;
        }
    }
}