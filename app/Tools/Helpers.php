<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/3/18
 * Time: 11:55
 */
use \Auth,\Route;
class Helper
{
    /*用于模板中来检测连接显不显示*/
    public static function checkPermission($route)
    {
        if(Auth::guard('admin')->user()->is_super || Auth::guard('admin')->user()->can($route)){
            return true;
        }else{
            return false;
        }
    }
}