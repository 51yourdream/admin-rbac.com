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
                    分配权限
                  <span class="tools pull-right">
                        <a class="fa fa-chevron-down" href="javascript:;"></a>
                        <a class="fa fa-times" href="javascript:;"></a>
                    </span>
                </div>
                <div class="panel-body">
                    <form role="ajax-form" action="{{ route('admin.role.permissions',['id'=>$role->id]) }}" method="post">
                        {{ csrf_field() }}
                        <div id="FlatTree4" class="tree tree-solid-line">
                        @foreach($permissions as $permission)
                            <div class="tree-folder" style="display: block;">
                                <div class="tree-folder-header">
                                    {{--{!! $permission->icon_html !!}--}}
                                    @if(in_array($permission['id'],array_keys($rolePermissions)))
                                        <input type="checkbox" class="top-permission-checkbox" name="permissions[]" value="{{ $permission['id'] }}" checked/>
                                    @else
                                        <input type="checkbox" class="top-permission-checkbox" name="permissions[]" value="{{ $permission['id'] }}"/>
                                    @endif
                                    <div class="tree-folder-name">
                                        <span class="show-sub-permissions" child-id="{{$permission->id}}">{{ $permission->display_name }}</span>
                                    </div>
                                </div>
                                @if($permission->sub_permission->count())
                                    <div class="tree-folder-content hide parent-permission-{{ $permission->id }}">
                                        @foreach($permission->sub_permission as $sub)
                                            <div class="tree-folder" style="display: block;">
                                                <div class="tree-folder-header">
                                                @if($sub['is_menu'])
                                                    <input type="checkbox" class="sub-permission-checkbox" name="permissions[]" value="{{ $sub['id'] }}" {{ in_array($sub['id'],array_keys($rolePermissions)) ? 'checked':'' }}/>
                                                @else
                                                    <input type="checkbox" class="sub-permission-checkbox" name="permissions[]" value="{{ $sub['id'] }}" {{ in_array($sub['id'],array_keys($rolePermissions)) ? 'checked':'' }}/>
                                                @endif
                                                    <div class="tree-folder-name">
                                                        {{ $sub->display_name }}
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                        <button type="submit" class="btn btn-primary">修改</button>
                        <button type="reset" class="btn btn-default">重置</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
@section('pageJs')
    <script>
        $(".top-permission-checkbox").change(function () {
            $(this).parents('.tree-folder-header').next('.tree-folder-content').find('input').prop('checked', $(this).prop('checked'));
        });

        $(".sub-permission-checkbox").change(function () {
            var j= 0,len=$(this).parents('.tree-folder-content').find('.sub-permission-checkbox').length;
            $.each($(this).parents('.tree-folder-content').find('.sub-permission-checkbox'),function(i, n){
                if($(n).prop('checked')){
                    j++;
                }
            });
            if (j==len) { //子全部被选中 父自动被选中
                $(this).parents('.tree-folder-content').prev('.tree-folder-header').find('input.top-permission-checkbox').prop('checked', true);
            }
            if (j==0) { //子一个都没有被选中 父自动取消选中
                $(this).parents('.tree-folder-content').prev('.tree-folder-header').find('input.top-permission-checkbox').prop('checked', false);
            }else{
                $(this).parents('.tree-folder-content').prev('.tree-folder-header').find('input.top-permission-checkbox').prop('checked', true);
            }
        });
    </script>
    <script>
        $(".show-sub-permissions").toggle(function () {
            var child_id = $(this).attr('child-id');
            $(".parent-permission-"+child_id).removeClass('hide');
        }, function () {
            var child_id = $(this).attr('child-id');
            $(".parent-permission-"+child_id).addClass('hide');
        });
    </script>
@stop
