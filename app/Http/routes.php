<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/mb', function () {
    return Redirect::to('mb/index.html',301);
});
Route::get('/layer', function () {
    return Redirect::to('layer-v2.1',301);
});
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');
});


Route::group(['middleware' => ['web'], 'namespace' => 'Admin', 'prefix' => 'admin'], function () {
    Route::auth();

    Route::get('/home', ['as' => 'admin.home', 'uses' => 'HomeController@index']);
    Route::resource('admin_user', 'AdminUserController');
    Route::delete('admin/admin_user/destoryall',['as'=>'admin.admin_user.destory.all','uses'=>'AdminUserController@destoryAll']);
    Route::get('admin_user/{id}/getRoles',['as'=>'admin.admin_user.get.roles','uses'=>'AdminUserController@getRoles']);
    Route::any('admin_user/{id}/assignRoles',['as'=>'admin.admin_user.assign.roles','uses'=>'AdminUserController@assignRoles']);
    Route::resource('role', 'RoleController');
    Route::delete('admin/role/destoryall',['as'=>'admin.role.destory.all','uses'=>'RoleController@destoryAll']);
    Route::get('role/{id}/permissions',['as'=>'admin.role.permissions','uses'=>'RoleController@permissions']);
    Route::post('role/{id}/permissions',['as'=>'admin.role.permissions','uses'=>'RoleController@storePermissions']);
    Route::resource('permission', 'PermissionController');
    Route::delete('admin/permission/destroyall',['as'=>'admin.permission.destroy.all','uses'=>'PermissionController@destroyAll']);
    Route::resource('blog', 'BlogController');

    /*搜索分页*/
    Route::resource('goods','GoodsController');
});


Route::get('/admin', function () {
    return view('admin.welcome');
});

Route::group(['middleware' => 'web'], function () {
    Route::auth();
    Route::get('/home', 'HomeController@index');
    Route::controller('captcha','YzmController');
});
