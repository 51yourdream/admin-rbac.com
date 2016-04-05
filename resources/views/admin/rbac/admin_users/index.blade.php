@extends('_layout.admin-app')
@section('pageCss')

    {{--当前页面独有的样式--}}
@stop

@section('heasJs')
    {{--当前页面独有 head js样式--}}
@stop
@section('pageHeading')
    <ul class="breadcrumb">
        {!! Breadcrumbs::render('admin-user-index') !!}
    </ul>
@stop
@section('wrapper')


    <div class="row">
        <div class="col-sm-12">
            <section class="panel">
                <header class="panel-heading">
                    @if(Helper::checkPermission('admin.admin_user.create'))
                        <a href="{{route('admin.admin_user.create')}}" class="btn btn-info"><i class="fa fa-plus"></i> 添加会员</a>
                    @endif
                        <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                            <a href="javascript:;" class="fa fa-times"></a>
                         </span>
                </header>
                <div class="panel-body">
                    <section id="unseen">
                        <table class="table table-bordered table-striped table-condensed">
                            <thead>
                            <tr>
                                <th>选择</th>
                                <th>ID</th>
                                <th>用户名</th>
                                <th>邮箱</th>
                                <th>超级管理员</th>
                                <th>所属角色</th>
                                <th>创建时间</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $key=>$user)
                                <tr>
                                    <td><input type="checkbox" name=""></td>
                                    <td>{{$user->id}}</td>
                                    <td class="">{{$user->name}}</td>
                                    <td class="">{{$user->email}}</td>
                                    <td>{!! $user->is_super ? '<span class="label label-danger">是</span>':'<span class="label label-default">否</span>' !!}</td>
                                    <td>
                                        @if($user->roles()->count())
                                            @foreach($user->roles()->get() as $role)
                                                <span class="badge badge-info">{{ $role->display_name }}</span>
                                            @endforeach
                                        @else
                                            <span class="badge">无</span>
                                        @endif
                                    </td>
                                    <td class="">{{$user->created_at}}</td>
                                    <td>
                                        @if(Helper::checkPermission('admin.admin_user.edit'))
                                            <a href="{{route('admin.admin_user.edit',['id'=>$user->id])}}" class="btn btn-sm btn-success margin-top-5"><i class="fa fa-pencil"></i> 修改信息</a>
                                        @endif
                                        @if(Helper::checkPermission('admin.admin_user.get.roles'))
                                            <div role="open-iframe" title="配置角色" shadeClose=0 shade="0.5" with="600px" height="400px" content="{{route('admin.admin_user.get.roles',['id'=>$user->id])}}" class="btn btn-sm btn-warning margin-top-5"><i class="fa fa-wrench"></i> 配置角色</div>
                                        @endif
                                        @if(Helper::checkPermission('admin.admin_user.destroy'))
                                                <a class="btn btn-sm btn-danger margin-top-5" role="ajax-delete"
                                                   data-href="{{ route('admin.admin_user.destroy',['id'=>$user->id]) }}">
                                                    <i class="fa fa-trash-o"></i> 删除</a>
                                        @endif
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

    {!! $users->render() !!}
@endsection

@section('javascript')
    @parent


@stop
@section('pageJs')
    {{--当前页面独有 js样式--}}
@stop