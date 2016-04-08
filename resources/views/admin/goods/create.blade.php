@extends('_layout.admin-app')
@section('pageCss')
    <!--file upload-->
    <link rel="stylesheet" type="text/css" href="{{asset('static/css/bootstrap-fileupload.min.css')}}" />
    {{--当前页面独有的样式--}}
@stop

@section('heasJs')
    {{--当前页面独有 head js样式--}}
@stop
@section('pageHeading')
    <ul class="breadcrumb">
        {!! Breadcrumbs::render('admin-goods-create') !!}
    </ul>
@stop
@section('wrapper')
    <div class="row">
        <div class="col-lg-6">
            <section class="panel">
                <header class="panel-heading">
                    <a href="{{route('admin.goods.index')}}" class="btn btn-default"><i class="fa fa-mail-reply"></i> 返回列表</a>
                </header>
                <div class="panel-body">
                    <form role="form" action="{{ route('admin.goods.store') }}" enctype="multipart/form-data" method="POST">
                        {!! csrf_field() !!}
                        <div class="form-group @if($errors->has('title')) has-error @endif">
                            <label class="control-label" for="title">{{Lang::get('information.goods.title')}}</label>
                            <input required  type="text" data-toggle="tooltip" name="title"
                                   data-trigger="hover" class="form-control tooltips" id="title"
                                   data-original-title="最多255个字符" value="{{ old('title') }}">
                            <p class="help-block">{{$errors->first('title')}}</p>
                        </div>
                        <div class="form-group @if($errors->has('description')) has-error @endif">
                            <label class="control-label" for="description">{{Lang::get('information.goods.description')}}</label>
                            <input required type="text" class="form-control" name="description" id="description"
                                   value="{{ old('description') }}">
                            <p class="help-block">{{$errors->first('description')}}</p>
                        </div>
                        <div class="form-group @if($errors->has('price')) has-error @endif">
                            <label class="control-label" for="price">{{Lang::get('information.goods.price')}}</label>
                            <input required type="text" class="form-control" name="price" id="price" onkeyup="this.value=/^\d{0,4}\.?\d{0,2}$/.test(this.value) ? this.value : this.value.substr(0,this.value.length-1)" value="{{ old('price') }}">
                            <p class="help-block">{{$errors->first('price')}}</p>
                        </div>
                        <div class="form-group @if($errors->has('stocks')) has-error @endif">
                            <label class="control-label" for="stocks">{{Lang::get('information.goods.stocks')}}</label>
                            <input  type="number" class="form-control" name="stocks" id="stocks" value="{{ old('stocks') }}">
                            <p class="help-block">{{$errors->first('stocks')}}</p>
                        </div>
                        <div class="form-group @if($errors->has('pic')) has-error @endif">
                            <label class="control-label" for="pic">{{Lang::get('information.goods.pic')}}</label>
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                    <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
                                    {{--<img src="holder.js/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />--}}
                                </div>
                                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                <div>
                                   <span class="btn btn-default btn-file">
                                       <span class="fileupload-new"><i class="fa fa-paper-clip"></i> 选择图片</span>
                                       <span class="fileupload-exists"><i class="fa fa-undo"></i> 重新选择</span>
                                       <input  type="file" class="default" name="pic"/>
                                   </span>
                                    <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> {{Lang::get('information.common.delete')}}</a>
                                </div>
                            </div>
                            <p class="help-block">{{$errors->first('pic')}}</p>
                        </div>
                        <div class="form-group @if($errors->has('details')) has-error @endif">
                            <label class="control-label" for="details">{{Lang::get('information.goods.details')}}</label>
                            <textarea class="form-control ckeditor" name="details" rows="6"></textarea>
                            <p class="help-block">{{$errors->first('details')}}</p>
                        </div>
                        <button type="submit" class="btn btn-primary">{{Lang::get('information.common.add')}}</button>
                        <button type="reset" class="btn btn-default">重置</button>
                    </form>

                </div>
            </section>
        </div>
    </div>
@stop
@section('pageJs')
    <script type="text/javascript" src="{{asset('static/js/ckeditor/ckeditor.js')}}"></script>
    <script src="{{asset('static/js/holder.min.js')}}"></script>
        <!--file upload-->
    <script type="text/javascript" src="{{asset('static/js/bootstrap-fileupload.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('static/js/bootstrap-inputmask/bootstrap-inputmask.min.js')}}"></script>
@stop