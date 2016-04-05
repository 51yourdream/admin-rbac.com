<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">
    <link rel="shortcut icon" href="#" type="image/png">

    <title>404 Page</title>

    <link href="{{asset('static/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('static/css/style-responsive.css')}}" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="{{asset('static/js/html5shiv.js')}}"></script>
    <script src="{{asset('static/js/respond.min.js')}}"></script>
    <![endif]-->
</head>

<body class="error-page">

<section>
    <div class="container ">

        <section class="error-wrapper text-center">
            <h1><img alt="" src="{{asset('static/images/403-error.png')}}"></h1>
            <h3>对不起，你没有权限操作这个页面</h3>
            <a class="back-btn" href="{{ $previousUrl }}"> 点击返回</a>
            <a class="back-btn" href="{{route('admin.home')}}"> 前往首页</a>
        </section>

    </div>
</section>

<!-- Placed js at the end of the document so the pages load faster -->
<script src="{{asset('static/js/jquery-1.10.2.min.js')}}"></script>
<script src="{{asset('static/js/jquery-migrate-1.2.1.min.js')}}"></script>
<script src="{{asset('static/js/bootstrap.min.js')}}"></script>
<script src="{{asset('static/js/modernizr.min.js')}}"></script>


<!--common scripts for all pages-->
<!--<script src="{{asset('static/js/scripts.js')}}"></script>-->

</body>
</html>
