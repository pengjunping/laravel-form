@extends('common.layouts')

@section('title')
    修改学生信息
@stop

@section('content')

    @include('common.validator')

    <div class="card">
        <div class="card-header">修改学生</div>
        {{--<form method="post" action="{{ url('student/save') }}">--}}
        @include('common._form')
    </div>
    </div>

@stop
