@extends('_layout.admin-app')


@section('pageCss')

    {{--当前页面独有的样式--}}
@stop

@section('heasJs')
    {{--当前页面独有 head js样式--}}
@stop

@section('wrapper')
    <div class="pageheader">
        <h2><i class="fa fa-home"></i> Dashboard <span>Subtitle goes here...</span></h2>
        <div class="breadcrumb-wrapper">
            <span class="label">You are here:</span>
            <ol class="breadcrumb">
                <li class="active">Dashboard</li>
            </ol>
        </div>
    </div>
    <button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="left" title="Tooltip on left">Tooltip on left</button>
    <div class="contentpanel">

    </div><!-- contentpanel -->
@stop


@section('pageJs')
    {{--当前页面独有 js样式--}}
@stop
