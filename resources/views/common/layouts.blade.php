<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>轻松学会Laravel - @yield('title')</title>

    {{--Bootstrap CSS 文件--}}
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    @section('style')

    @show
</head>
<body>

{{--头部--}}
@section('header')
    <div class="jumbotron">
        <div class="container">
            <h2>轻松学会Laravel</h2>

            <p>- 玩转Laravel表单</p>
        </div>
    </div>
@show

{{--中间内容区域--}}
<div class="container">
    <div class="row">

        {{--左侧菜单区域--}}
        <div class="col-md-3">
            @section('left-menu')
                <div class="list-group">
                    <a href="{{ url('student/index') }}"
                       class="list-group-item {{Request::getPathInfo() != '/student/create'? 'active':''}}">学生列表</a>
                    <a href="{{ url('student/create') }}"
                       class="list-group-item {{Request::getPathInfo() == '/student/create'? 'active':''}}">新增学生</a>
                </div>
            @show
        </div>

        {{--右侧内容区域--}}
        <div class="col-md-9">

            @yield('content')

        </div>
    </div>
</div>

{{--尾页--}}
@section('footer')
    <div class="jumbotron">
        <div class="container">
            <span>@2018 imooc.com</span>
        </div>
    </div>
@show

{{--JQuery 文件--}}
<script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
{{--Bootstrap JavaScript 文件--}}
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
@section('javascript')

@show

</body>
</html>