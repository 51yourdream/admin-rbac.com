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
        {!! Breadcrumbs::render('admin-role-index') !!}
    </ul>
@stop
@section('wrapper')
    <div class="row">
        <div class="col-sm-12">
            <section class="panel">
                <header class="panel-heading">
                    @if(Helper::checkPermission('admin.role.create'))
                        <a href="{{route('admin.role.create')}}" class="btn btn-info"><i class="fa fa-plus"></i> 添加角色</a>
                    @endif
                </header>
                <div class="panel-body">
                    <section id="unseen">
                        <table class="table table-bordered table-striped table-condensed">
                            <thead>
                                <tr>
                                    <th>
                                        <span class="ckbox ckbox-primary">
                                            <input type="checkbox" id="selectall"/>
                                            <label for="selectall"></label>
                                        </span>
                                    </th>
                                    <th>标识</th>
                                    <th>角色名</th>
                                    <th>说明</th>
                                    <th>创建时间</th>
                                    <th>操作</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($roles as $key=>$role)
                                <tr>
                                    <td>
                                        <div class="ckbox ckbox-default">
                                            <input type="checkbox" name="id" id="id-{{ $role->id }}"
                                                   value="{{ $role->id }}" class="selectall-item"/>
                                            <label for="id-{{ $role->id }}"></label>
                                        </div>
                                    </td>
                                    <td>{{ $role->name }}</td>
                                    <td>{{ $role->display_name }}</td>
                                    <td>{{ $role->description }}</td>
                                    <td>{{ $role->created_at }}</td>
                                    <td>
                                        <a href="{{ route('admin.role.edit',['id'=>$role->id]) }}" class="btn btn-sm btn-success margin-top-5"><i class="fa fa-pencil"></i> 修改信息</a>
                                        <div role='open-iframe' title="查看权限" shadeClose=0 shade="0.5" with="600px" height="400px" content="{{ route('admin.role.permissions',['id'=>$role->id]) }}" class="btn btn-sm btn-warning margin-top-5" role="layer"><i class="fa fa-wrench"></i> 配置权限</div>
                                        {{--<a href="" class="btn btn-sm btn-danger margin-top-5">禁用</a>--}}
                                        <a class="btn btn-sm btn-danger margin-top-5" role="ajax-delete"
                                           data-href="{{ route('admin.role.destroy',['id'=>$role->id]) }}">
                                            <i class="fa fa-trash-o"></i> 删除</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </section>
                </div>
            </section>
        </div>
    </div>

    {!! $roles->render() !!}
@stop

@section('javascript')
    @parent
    <script src="{{ asset('js/ajax.js') }}"></script>
    <script type="text/javascript">
        $(".role-delete").click(function () {
            Rbac.ajax.delete({
                confirmTitle: '确定删除角色?',
                href: $(this).data('href'),
                successTitle: '角色删除成功'
            });
        });

        $(".deleteall").click(function () {
            Rbac.ajax.deleteAll({
                confirmTitle: '确定删除选中的角色?',
                href: $(this).data('href'),
                successTitle: '角色删除成功'
            });
        });
    </script>

@endsection
