@extends('layouts.app')


@section('pageCss')

    {{--当前页面独有的样式--}}
@stop

@section('heasJs')
    {{--当前页面独有 head js样式--}}
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        You are logged in!
                        <?php var_dump(Auth::user()->nickname);?>

                    </div>
                </div>
            </div>
        </div>
    </div>
@stop


@section('pageJs')
    {{--当前页面独有 js样式--}}
@stop
