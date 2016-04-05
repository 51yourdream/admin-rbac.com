@extends('_layout.iframe-app')
@section('pageCss')
    <link rel="stylesheet" href="{{asset('static/js/fuelux/css/tree-style.css')}}">
    {{--当前页面独有的样式--}}
@stop
@section('wrapper')
    <div class="row">
        <div class="col-xs-12">
            <div class="panel">
                <div class="panel-heading">
                    角色分配
                  <span class="tools pull-right">
                        <a class="fa fa-chevron-down" href="javascript:;"></a>
                        <a class="fa fa-times" href="javascript:;"></a>
                    </span>
                </div>
                <div class="panel-body">
                    <form role="ajax-form" action="{{ route('admin.admin_user.assign.roles',['id'=>$id])}}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="name">角色组</label>
                            @inject('rolePresenter','App\Presenters\RolePresenter')
                            {!! $rolePresenter->rolesCheckbox($hasRoles) !!}
                        </div>
                        <button type="submit" class="btn btn-xs btn-primary">修改</button>
                        <button type="reset" class="btn btn-xs btn-default">重置</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
@section('pageJs')
@stop
