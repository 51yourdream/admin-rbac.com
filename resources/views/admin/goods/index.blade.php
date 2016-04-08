@extends('_layout.admin-app')
@section('pageCss')
    <link rel="stylesheet" type="text/css" href="{{asset('static/js/bootstrap-datepicker/css/datepicker-custom.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('static/js/bootstrap-timepicker/css/timepicker.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('static/js/bootstrap-colorpicker/css/colorpicker.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('static/js/bootstrap-daterangepicker/daterangepicker-bs3.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('static/js/bootstrap-datetimepicker/css/datetimepicker-custom.css')}}" />
    {{--当前页面独有的样式--}}
@stop

@section('headJs')
    {{--当前页面独有 head js样式--}}
    {{--当前页面独有 js样式--}}
@stop
@section('pageHeading')
    <ul class="breadcrumb">
        {!! Breadcrumbs::render('admin-goods-index') !!}
    </ul>
@stop
@section('wrapper')
    <div class="row">
        <div class="col-sm-12">
            <section class="panel">
                <header class="panel-heading">
                    @if(Helper::checkPermission('admin.goods.create'))
                        <a href="{{route('admin.goods.create')}}" class="btn btn-info"><i class="fa fa-plus"></i> 添加商品</a>
                    @endif
                </header>
                <div class="panel-body">
                    <section style="padding-bottom: 10px">
                        <form action="" class="form-inline">
                            <label  for="pageSize">分页</label>
                            <select class="form-control" name="pageSize" size="1" aria-controls="dynamic-table">
                                <?php echo Helper::page_size_select(10,5);?>
                            </select>
                            <div class="form-group">
                                <label  for="title">标题</label>
                                <input id="title" class="form-control" name="title" type="text" placeholder="标题" @if(isset($parameters['title']))value="{{$parameters['title'],''}}" @endif>
                            </div>
                            <div class="form-group">
                                <label  for="title1">添加时间</label>
                                <input class="form-control dpd1" type="text" name="created_at_from" @if(isset($parameters['created_at_from']))value="{{$parameters['created_at_from'],''}}" @endif>
                                <label  for="title1">至</label>
                                <input class="form-control dpd2" type="text" name="created_at_to" @if(isset($parameters['created_at_to']))value="{{$parameters['created_at_to'],''}}" @endif>
                            </div>
                            <button class="btn btn-success"><span class='fa fa-search'></span> 搜索</button>
                            <a href="{{route('admin.goods.index')}}" class="btn btn-default"><span class="fa fa-eraser"></span> 清空</a>
                        </form>
                    </section>
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
                                    <th>
                                        <div style="float: left">
                                            <span>ID</span>
                                        </div>
                                        <div style="float: right;">
                                            <div><a href="{{route('admin.goods.index')}}{{Helper::sort('id_sort','ASC')}}" @if(isset($parameters['id_sort']) && $parameters['id_sort']=='ASC') class="color-red" @endif><span class="fa fa-sort-desc paixu"></span></a></div>
                                            <div><a href="{{route('admin.goods.index')}}{{Helper::sort('id_sort','DESC')}}" @if(isset($parameters['id_sort']) && $parameters['id_sort']=='DESC') class="color-red" @endif><span class="fa fa-sort-asc paixu"></span></a></div>
                                        </div>
                                    </th>
                                    <th>商品名称</th>
                                    <th>
                                        <div style="float: left">
                                            <span>价钱</span>
                                        </div>
                                        <div style="float: right;">
                                            <div><a href="{{route('admin.goods.index')}}{{Helper::sort('price_sort','ASC')}}" @if(isset($parameters['price_sort']) && $parameters['price_sort']=='ASC') class="color-red" @endif><span class="fa fa-sort-desc paixu"></span></a></div>
                                            <div><a href="{{route('admin.goods.index')}}{{Helper::sort('price_sort','DESC')}}" @if(isset($parameters['price_sort']) && $parameters['price_sort']=='DESC') class="color-red" @endif><span class="fa fa-sort-asc paixu"></span></a></div>
                                        </div>
                                    </th>
                                    <th>
                                        <div style="float: left">
                                            <span>库存</span>
                                        </div>
                                        <div style="float: right;">
                                            <div><a href="{{route('admin.goods.index')}}{{Helper::sort('stocks_sort','ASC')}}" @if(isset($parameters['stocks_sort']) && $parameters['stocks_sort']=='ASC') class="color-red" @endif><span class="fa fa-sort-desc paixu"></span></a></div>
                                            <div><a href="{{route('admin.goods.index')}}{{Helper::sort('stocks_sort','DESC')}}" @if(isset($parameters['stocks_sort']) && $parameters['stocks_sort']=='DESC') class="color-red" @endif><span class="fa fa-sort-asc paixu"></span></a></div>
                                        </div>
                                    </th>
                                    <th>
                                        <div style="float: left">
                                            <span>销量</span>
                                        </div>
                                        <div style="float: right;">
                                            <div><a href="{{route('admin.goods.index')}}{{Helper::sort('salenum_sort','ASC')}}" @if(isset($parameters['salenum_sort']) && $parameters['salenum_sort']=='ASC') class="color-red" @endif><span class="fa fa-sort-desc paixu"></span></a></div>
                                            <div><a href="{{route('admin.goods.index')}}{{Helper::sort('salenum_sort','DESC')}}" @if(isset($parameters['salenum_sort']) && $parameters['salenum_sort']=='DESC') class="color-red" @endif><span class="fa fa-sort-asc paixu"></span></a></div>
                                        </div>
                                    </th>
                                    <th>图片</th>
                                    <th>
                                        <div style="float: left">
                                            <span>添加时间</span>
                                        </div>
                                        <div style="float: right;">
                                            <div><a href="{{route('admin.goods.index')}}{{Helper::sort('created_at_sort','ASC')}}" @if(isset($parameters['created_at_sort']) && $parameters['created_at_sort']=='ASC') class="color-red" @endif><span class="fa fa-sort-desc paixu"></span></a></div>
                                            <div><a href="{{route('admin.goods.index')}}{{Helper::sort('created_at_sort','DESC')}}" @if(isset($parameters['created_at_sort']) && $parameters['created_at_sort']=='DESC') class="color-red" @endif><span class="fa fa-sort-asc paixu"></span></a></div>
                                        </div>
                                    </th>
                                    <th>修改时间</th>
                                    <th>操作</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if(!empty($goods))
                                @foreach($goods as $key=>$value)
                                    <tr>
                                        <td>
                                            <div class="ckbox ckbox-default">
                                                <input type="checkbox" name="id" id="id-{{ $value->id }}"
                                                       value="{{ $value->id }}" class="selectall-item"/>
                                                <label for="id-{{ $value->id }}"></label>
                                            </div>
                                        </td>
                                        <td>{{ $value->id }}</td>
                                        <td>{{ $value->title }}</td>
                                        <td>{{ $value->price }}</td>
                                        <td>{{ $value->stocks }}</td>
                                        <td>{{ $value->salenum }}</td>
                                        <td><img src="{{asset(ltrim($value->pic,'/'))}}" width="100px" alt="{{$value->title}}"></td>
                                        <td>{{ $value->created_at }}</td>
                                        <td>{{ $value->updated_at }}</td>
                                        <td>
                                            <a href="{{ route('admin.goods.edit',['id'=>$value->id]) }}" class="btn btn-sm btn-success margin-top-5"><i class="fa fa-pencil"></i> 修改信息</a>
                                            <div role='open-iframe' title="查看权限" shadeClose=0 shade="0.5" with="600px" height="400px" content="{{ route('admin.goods.index',['id'=>$value->id]) }}" class="btn btn-sm btn-warning margin-top-5" role="layer"><i class="fa fa-wrench"></i>查看详情</div>
                                            {{--<a href="" class="btn btn-sm btn-danger margin-top-5">禁用</a>--}}
                                            <a class="btn btn-sm btn-danger margin-top-5" role="ajax-delete"
                                               data-href="{{ route('admin.goods.destroy',['id'=>$value->id]) }}">
                                                <i class="fa fa-trash-o"></i> 删除</a>
                                        </td>
                                    </tr>
                                @endforeach
                              @endif
                            </tbody>
                        </table>
                    </section>
                </div>
            </section>
        </div>
    </div>

    {!! $goods->appends($parameters)->render() !!}
@stop
@section('pageJs')
    <script type="text/javascript" src="{{asset('static/js/bootstrap-datepicker/js/bootstrap-datepicker.js')}}"></script>
    <script type="text/javascript" src="{{asset('static/js/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js')}}"></script>
    <script type="text/javascript" src="{{asset('static/js/bootstrap-daterangepicker/moment.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('static/js/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
    <script type="text/javascript" src="{{asset('static/js/bootstrap-colorpicker/js/bootstrap-colorpicker.js')}}"></script>
    <script type="text/javascript" src="{{asset('static/js/bootstrap-timepicker/js/bootstrap-timepicker.js')}}"></script>

    <!--pickers initialization-->
    {{--<script src="{{asset('static/js/pickers-init.js')}}"></script>--}}
    <script>
        // disabling dates
        var nowTemp = new Date();
        var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);

        var checkin = $('.dpd1').datepicker({
            onRender: function(date) {
                return date.valueOf() < now.valueOf() ? 'disabled' : '';
            },
            format: 'yyyy-mm-dd'
        }).on('changeDate', function(ev) {
            if (ev.date.valueOf() > checkout.date.valueOf()) {
                var newDate = new Date(ev.date)
                newDate.setDate(newDate.getDate() + 1);
                checkout.setValue(newDate);
            }
            checkin.hide();
            $('.dpd2')[0].focus();
        }).data('datepicker');
        var checkout = $('.dpd2').datepicker({
            onRender: function(date) {
                return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
            },
            format: 'yyyy-mm-dd'
        }).on('changeDate', function(ev) {
            checkout.hide();
        }).data('datepicker');
    </script>
@stop