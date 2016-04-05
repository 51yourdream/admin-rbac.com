@extends('_layout.admin-app')
@section('pageCss')

    {{--当前页面独有的样式--}}
@stop

@section('heasJs')
    {{--当前页面独有 head js样式--}}
@stop
@section('pageHeading')
    <ul class="breadcrumb">
        {!! Breadcrumbs::render('admin-role-edit') !!}
    </ul>
@stop
@section('wrapper')
    <div class="row">
        <div class="col-lg-6">
            <section class="panel">
                <header class="panel-heading">
                    <a href="{{URL::to('admin/role')}}" class="btn btn-default"><i class="fa fa-mail-reply"></i> 返回列表</a>
                </header>
                <div class="panel-body">
                    <form role="form" action="{{ route('admin.role.update',['id'=>$role->id]) }}" method="POST">
                        <input type="hidden" name="_method" value="PUT">
                        {!! csrf_field() !!}
                        <div class="form-group">
                            <label for="name">角色名称</label>
                            <input type="text" data-toggle="tooltip" name="name"
                                   data-trigger="hover" class="form-control tooltips" id="name"
                                   data-original-title="不可重复" value="{{ $role->name }}">
                        </div>
                        <div class="form-group">
                            <label for="display_name">显示名称</label>
                            <input type="text" class="form-control" name="display_name" id="display_name"
                                   value="{{ $role->display_name }}">
                        </div>
                        <div class="form-group">
                            <label for="description">说明</label>
                            <input type="text" class="form-control" name="description" id="description"
                                   value="{{ $role->description }}">
                        </div>
                        <button type="submit" class="btn btn-primary">修改</button>
                        <button type="reset" class="btn btn-default">重置</button>
                    </form>

                </div>
            </section>
        </div>
    </div>
@stop