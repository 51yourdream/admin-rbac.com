@extends('_layout.admin-app')
@section('pageCss')

    {{--当前页面独有的样式--}}
@stop

@section('heasJs')
    {{--当前页面独有 head js样式--}}
@stop
@section('pageHeading')
    <ul class="breadcrumb">
        {!! Breadcrumbs::render('admin-permission-edit') !!}
    </ul>
@stop
@section('wrapper')
    <div class="row">
        <div class="col-lg-6">
            <section class="panel">
                <header class="panel-heading">
                    <a href="{{URL::to('admin/permission')}}" class="btn btn-default"><i class="fa fa-mail-reply"></i> 返回列表</a>
                </header>
                <div class="panel-body">
                    <form role="form" action="{{ route('admin.permission.update',['id'=>$permission->id]) }}" method="POST">
                        <input type="hidden" name="_method" value="PUT">
                        {!! csrf_field() !!}
                        <div class="form-group">
                            <label for="sort">所属角色组</label>
                            @inject('permissionPresenter','App\Presenters\PermissionPresenter')
                            {!! $permissionPresenter->topPermissionSelect($permission->fid) !!}
                        </div>
                        <div class="form-group">
                            <label for="name">权限路由</label>
                            <input class="form-control tooltips" name="name" id="name" value="{{ $permission->name }}" placeholder="权限路由"
                                   type="text"  data-toggle="tooltip" data-trigger="hover" data-original-title="不可重复,不可点击路由输入`#`">
                        </div>
                        <div class="form-group">
                            <label for="display_name">显示名称</label>
                            <input type="text" name="display_name" id="display_name" value="{{ $permission->display_name }}"
                                   data-toggle="tooltip"
                                   data-trigger="hover"
                                   class="form-control tooltips"
                                   data-original-title="如果是菜单则表示菜单名称">
                        </div>
                        <div class="form-group">
                            <label for="description">说明</label>
                            <input type="text" name="description" id="description" value="{{ $permission->description }}"
                                   data-toggle="tooltip"
                                   data-trigger="hover"
                                   class="form-control tooltips"
                                   data-original-title="对该权限的解释">
                        </div>
                        <div class="form-group">
                            <label for="icon">图标<a href="/mb/html/fontawesome.html" target="_blank"><i class="fa fa-info-circle"></i></a></label>
                            <input type="text" name="icon" id="icon" value="{{ $permission->icon }}"
                                   data-toggle="tooltip"
                                   data-trigger="hover"
                                   class="form-control tooltips"
                                   data-original-title="图标名称,去fa-前缀">
                        </div>
                        <div class="form-group">
                            <label for="is_menu">是否菜单</label>
                            <select class="form-control input-sm" name="is_menu" id="is_menu">
                                <option value="1" {{ $permission->is_menu ? 'selected':'' }}>是</option>
                                <option value="0" {{ $permission->is_menu ? '':'selected' }}>否</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="sort">排序</label>
                            <input type="text" name="sort" id="sort" value="{{ $permission->sort }}"
                                   data-toggle="tooltip"
                                   data-trigger="hover"
                                   class="form-control tooltips"
                                   data-original-title="请填入数字">
                        </div>
                        <button type="submit" class="btn btn-primary">修改</button>
                        <button type="reset" class="btn btn-default">重置</button>
                    </form>

                </div>
            </section>
        </div>
    </div>
@stop
