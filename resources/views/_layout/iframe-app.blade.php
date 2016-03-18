<!doctype html>
<html lang="en">
<head>
    <title>{{$pageTitle or 'adminEx后台管理'}}</title>
    <meta name="keywords" content="{{$pageKeywords or '后台管理系统'}}" />
    <meta name="description" content="{{$pageDescription or '网站描述'}}" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    @include('_layout.css')
    @include('_layout.commonCss')
    {{--当前页面独有css--}}
    @yield('pageCss')
</head>
<body class="sticky-header body-background-color">
@yield('wrapper')

@include('_layout.js')
@include('_layout.commonJs')
{{--当前页面独有js--}}
@yield('pageJs')
</body>
</html>