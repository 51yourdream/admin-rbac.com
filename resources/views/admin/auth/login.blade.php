<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">
    <meta name="csrf-token" content="{{csrf_token()}}" />
    <link rel="shortcut icon" href="#" type="image/png">

    <title>Login</title>

    @include('_layout.css')

            <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="{{asset('static/js/html5shiv.js')}}"></script>
    <script src="{{asset('static/js/respond.min.js')}}"></script>
    <![endif]-->
</head>

<body class="login-body">

<div class="container">
    <form class="form-signin" action="{{ url('/admin/login') }}" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-signin-heading text-center">
            <h1 class="sign-title">登录</h1>
            <img src="{{asset('static/images/login-logo.png')}}" alt=""/>
        </div>
        <div class="login-wrap">
            @if($errors->first())
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <strong>{{ $errors->first() }}!</strong>
                </div>
            @endif
            <input type="text" class="form-control" placeholder="email" name="email" value="{{old('email')}}">
            <input type="password" class="form-control" name="password" placeholder="Password">

            <button class="btn btn-lg btn-login btn-block" type="submit">
                <i class="fa fa-check"></i>
            </button>

            <div class="registration">
                还没有账号？
                <a class="" href="{{url('/admin/register')}}">
                    注册
                </a>
            </div>
            <label class="checkbox">
                <input type="checkbox" value="remember-me"> 记住密码
                <span class="pull-right">
                    <a data-toggle="modal" href="#myModal"> 忘记密码？</a>

                </span>
            </label>

        </div>

        <!-- Modal -->
        {{--<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">--}}
        {{--<div class="modal-dialog">--}}
        {{--<div class="modal-content">--}}
        {{--<div class="modal-header">--}}
        {{--<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>--}}
        {{--<h4 class="modal-title">Forgot Password ?</h4>--}}
        {{--</div>--}}
        {{--<div class="modal-body">--}}
        {{--<p>Enter your e-mail address below to reset your password.</p>--}}
        {{--<input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">--}}

        {{--</div>--}}
        {{--<div class="modal-footer">--}}
        {{--<button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>--}}
        {{--<button class="btn btn-primary" type="button">Submit</button>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        <!-- modal -->

    </form>

</div>



@include('_layout.js')

</body>
</html>
