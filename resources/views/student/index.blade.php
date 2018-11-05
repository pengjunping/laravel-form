@extends('common.layouts')

@section('title')
    首页
@stop

@section('content')

    @include('common.message')

    {{--自定义内容区域--}}
    <div class="container">
        <h2>学生列表</h2>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>姓名</th>
                <th>年龄</th>
                <th>性别</th>
                <th>添加时间</th>
                <th width="140">操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($students as $student)
                <tr>
                    <td scope="row">{{ $student->id }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->age }}</td>
                    <td>{{ $student->getSex($student->sex) }}</td>
                    <td>{{ $student->created_at->format('Y-m-d') }}</td>
                    <td>
                        <a href="{{ url('student/detail',['id'=>$student->id]) }}">详情</a>
                        <a href="{{ url('student/update',['id'=>$student->id]) }}">修改</a>
                        <a href="{{ url('student/delete',['id'=>$student->id]) }}"
                        onclick="if (confirm('确定要删除吗？') == false) return false">删除</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    {{--分页--}}
    <div class="pull-right">
        {{ $students->render() }}
    </div>

@stop