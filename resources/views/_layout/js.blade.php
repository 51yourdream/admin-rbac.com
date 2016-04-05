@section('masterJs')
<!-- Placed js at the end of the document so the pages load faster -->
<script src="{{asset('static/js/jquery-1.10.2.min.js')}}"></script>
<script src="{{asset('static/js/jquery-ui-1.9.2.custom.min.js')}}"></script>
<script src="{{asset('static/js/jquery-migrate-1.2.1.min.js')}}"></script>
<script src="{{asset('static/js/bootstrap.min.js')}}"></script>
<script src="{{asset('static/js/modernizr.min.js')}}"></script>
<script src="{{asset('static/js/jquery.nicescroll.js')}}"></script>
<script src="{{asset('static/js/jquery.form.js')}}"></script>
{{--layer弹框--}}
<script src="{{asset('static/layer/layer.js')}}"></script>

<!--common scripts for all pages-->
<script src="{{asset('static/js/scripts.js')}}"></script>
{{--<script src="{{asset('static/common/common.js')}}"></script>--}}
{!! Toastr::render() !!}
@show
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(function(){
        $('[data-toggle="tooltip"]').tooltip(); //初始化 tooltip插件
        $("[role='open-iframe']").click(function(){
            var title,shadeClose,shade,w,h,content;
            title = $(this).attr('title') ? $(this).attr('title') : false;
            shadeClose = parseFloat($(this).attr('shadeClose')) ? true : false;
            shade = parseFloat($(this).attr('shade')) ? parseFloat($(this).attr('shade')) : 0;
            w = $(this).attr('with') ? $(this).attr('with') : '600px';
            h = $(this).attr('height') ? $(this).attr('height') : '400px';
            content = $(this).attr('content') ? $(this).attr('content') : '';
            layer.open({
                type:2,
                title: title,
                shadeClose: shadeClose,
                shade: shade,
                area: [w,h],
                content: content
            });
        });

//ajax 删除单条数据操作 type=DELETE
        $('[role="ajax-delete"]').click(function () {
            var url = $(this).attr('data-href'),index;
            index = layer.confirm('确定要删除?', {
                btn: ['确定','取消'] //按钮
            }, function(){
                layer.close(index);
                $.ajax({
                    type:'DELETE',
                    url:url,
                    success:function(data){
                        if(data.status){
                            layer.msg(data.msg,{icon:6});
                            window.location.reload();
                        }else{
                            layer.msg(data.msg,{icon:5});
                        }
                    }
                });
            });
        });

        /*ajax form提交*/
        $('[role="ajax-form"]').submit(function(){
            $(this).ajaxSubmit(function(data){
                if(data.status){
                    layer.msg(data.msg,{icon:6});
                }else{
                    layer.msg(data.msg,{icon:5});
                }
            });
            // 为了防止普通浏览器进行表单提交和产生页面导航（防止页面刷新？）返回false
            return false;
        });
    });
</script>