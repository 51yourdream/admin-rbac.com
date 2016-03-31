<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Toastr,Breadcrumbs;

class GoodsController extends Controller
{
    public function __construct()
    {
        Breadcrumbs::setView('admin._partials.breadcrumbs');
        Breadcrumbs::register('goods',function($breadcrumbs){
            $breadcrumbs->parent('dashboard');
            $breadcrumbs->push('商品管理', route('goods.index'));
        });
    }

    public function index()
    {
        echo '商品首页';
    }
}
