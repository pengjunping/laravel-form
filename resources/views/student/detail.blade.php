@extends('common.layouts')

@section('content')

    <div class="card">
        <div class="card-header">学生详情</div>
        <div class="card-body">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th>ID</th>
                        <td>{{ $student->id }}</td>
                    </tr>
                    <tr>
                        <th>姓名</th>
                        <td>{{ $student->name }}</td>
                    </tr>
                    <tr>
                        <th>年龄</th>
                        <td>{{ $student->age }}</td>
                    </tr>
                    <tr>
                        <th>性别</th>
                        <td>{{ $student->getSex($student->sex) }}</td>
                    </tr>
                    <tr>
                        <th>添加日期</th>
                        <td>{{ $student->created_at->format('Y-m-d') }}</td>
                    </tr>
                    <tr>
                        <th>修改日期</th>
                        <td>{{ $student->updated_at->format('Y-m-d') }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

@stop
