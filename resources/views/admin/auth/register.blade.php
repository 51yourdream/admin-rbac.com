<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="shortcut icon" href="#" type="image/png">

    <title>注册</title>

    @include('_layout.css')

            <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="{{asset('static/js/html5shiv.js')}}"></script>
    <script src="{{asset('static/js/respond.min.js')}}"></script>
    <![endif]-->
</head>

<body class="login-body">

<div class="container">

    <form class="form-signin" action="{{url('/admin/register')}}" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-signin-heading text-center">
            <h1 class="sign-title">注册</h1>
            <img src="{{asset('static/images/login-logo.png')}}" alt=""/>
        </div>
        <div class="login-wrap">

            <div class="form-group {{ $errors->has('name') ? ' has-error' : 'has-success' }}">
                <div>
                    <input type="text" class="form-control" id="name" placeholder="用户名" name="name" value="{{ old('name') }}">
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group {{ $errors->has('email') ? ' has-error' : 'has-success' }}">

                <div>
                    <input type="text" class="form-control" id="email" placeholder="邮箱" name="email" value="{{ old('email') }}">
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group {{ $errors->has('password') ? ' has-error' : 'has-success' }}">

                <div>
                    <input type="text" class="form-control" id="password" placeholder="密码"  name="password">
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group {{ $errors->has('password_confirmation') ? ' has-error' : 'has-success' }}">
                <div>
                    <input type="text" class="form-control" id="password_confirmation" placeholder="确认密码"  name="password_confirmation">
                    @if ($errors->has('password_confirmation'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <button class="btn btn-lg btn-login btn-block" type="submit">
                <i class="fa fa-check"></i>
            </button>

            <div class="registration">
                已经注册过?
                <a class="" href="{{url('/admin/login')}}">
                    登陆
                </a>
            </div>

        </div>
    </form>
</div>

<!-- Placed js at the end of the document so the pages load faster -->

<!-- Placed js at the end of the document so the pages load faster -->
<script src="{{asset('static/js/jquery-1.10.2.min.js')}}"></script>
<script src="{{asset('static/js/bootstrap.min.js')}}"></script>
<script src="{{asset('static/js/modernizr.min.js')}}"></script>

</body>
</html>
