@extends('_layout.admin-app')
@section('pageCss')
    <link rel="stylesheet" href="{{asset('static/js/fuelux/css/tree-style.css')}}">
    {{--当前页面独有的样式--}}
@stop

@section('headJs')
    {{--当前页面独有 head js样式--}}
    {{--当前页面独有 js样式--}}

@stop
@section('pageHeading')
    <ul class="breadcrumb">
        {!! Breadcrumbs::render('admin-permission-index') !!}
    </ul>
@stop
@section('wrapper')
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-lg-6">
            <div class="panel">
                <div class="panel-heading">
                    @if(Helper::checkPermission('admin.permission.create'))
                        <a href="{{route('admin.permission.create')}}" class="btn btn-info"><i class="fa fa-plus"></i> 添加权限</a>
                    @endif
                  <span class="tools pull-right">
                        <a class="fa fa-chevron-down" href="javascript:;"></a>
                        <a class="fa fa-times" href="javascript:;"></a>
                    </span>
                </div>
                <div class="panel-body">
                    <div id="FlatTree4" class="tree tree-solid-line">
                        @foreach($permissions as $permission)
                        <div class="tree-folder" style="display: block;">
                            <div class="tree-folder-header">
                                {!! $permission->icon_html !!}
                                <div class="tree-folder-name">
                                    <span class="show-sub-permissions" child-id="{{$permission->id}}">{{ $permission->display_name }}</span>
                                    <div class="tree-actions">
                                        {!! $permission->is_menu ? '<span class="label label-danger" data-toggle="tooltip" data-placement="top" title="是否是菜单">是</span>':'<span class="label label-default" data-toggle="tooltip" data-placement="top" title="是否是菜单">否</span>' !!}
                                        <span class="label label-info" data-toggle="tooltip"  title="{{ $permission->description }}">描述</span>

                                        @if(Helper::checkPermission('admin.permission.edit'))
                                            <a href="{{ route('admin.permission.edit',['id'=>$permission->id]) }}" data-toggle="tooltip" title="修改"
                                               class="btn btn-white btn-sm"><i class="fa fa-pencil"></i></a>
                                        @endif
                                        @if(Helper::checkPermission('admin.permission.destroy'))
                                            <i class="fa fa-trash-o" role="ajax-delete" data-toggle="tooltip" title="删除" data-href="{{ route('admin.permission.destroy',['id'=>$permission->id]) }}"></i>
                                        @endif
                                    </div>
                                </div>
                            </div>
                                @if($permission->sub_permission->count())
                                <div class="tree-folder-content hide parent-permission-{{ $permission->id }}">
                                    @foreach($permission->sub_permission as $sub)
                                        <div class="tree-folder" style="display: block;">
                                            <div class="tree-folder-header">
                                                {!! $sub->icon_html !!}
                                                <div class="tree-folder-name">
                                                    {{ $sub->display_name }}
                                                    <div class="tree-actions">
                                                        {!! $sub->is_menu ? '<span class="label label-danger" data-toggle="tooltip" data-placement="top" title="是否是菜单">是</span>':'<span class="label label-default" data-toggle="tooltip" data-placement="top" title="是否是菜单">否</span>' !!}
                                                        <span class="label label-info" data-toggle="tooltip"  title="{{ $sub->description }}">描述</span>
                                                        @if(Helper::checkPermission('admin.permission.edit'))
                                                            <a href="{{ route('admin.permission.edit',['id'=>$sub->id]) }}" data-toggle="tooltip" title="修改"
                                                               class="btn btn-white btn-sm"><i class="fa fa-pencil"></i></a>
                                                        @endif
                                                        @if(Helper::checkPermission('admin.permission.destroy'))
                                                            <i class="fa fa-trash-o" role="ajax-delete" data-toggle="tooltip" title="删除" data-href="{{ route('admin.permission.destroy',['id'=>$sub->id]) }}"></i>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                @endif
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('pageJs')
    <script src="{{ asset('js/ajax.js') }}"></script>
    <!--tree-->
    {{--<script src="{{asset('static/js/fuelux/js/tree.min.js')}}"></script>--}}
    {{--<script src="{{asset('static/js/tree-init.js')}}"></script>--}}

    <script>
                $(".show-sub-permissions").toggle(function () {
                    var child_id = $(this).attr('child-id');
                    $(".parent-permission-"+child_id).removeClass('hide');
                }, function () {
                    var child_id = $(this).attr('child-id');
                    $(".parent-permission-"+child_id).addClass('hide');
                });

        $(".permission-delete").click(function () {
            Rbac.ajax.delete({
                confirmTitle: '确定删除该权限吗？如果该权限有下属权限将被一起删除！',
                href: $(this).data('href'),
                successTitle: '权限删除成功'
            });
        });

        $(".deleteall").click(function () {
            Rbac.ajax.deleteAll({
                confirmTitle: '确定删除选中的权限吗？如果该权限有下属权限将被一起删除！',
                href: $(this).data('href'),
                successTitle: '权限删除成功'
            });
        });
    </script>
    <script>

    </script>
@stop