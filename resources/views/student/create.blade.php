@extends('common.layouts')

@section('title')
    新增学生信息
@stop

@section('content')

    @include('common.validator')

    <div class="card">
        <div class="card-header">新增学生</div>
        @include('common._form')
    </div>
    </div>

@stop
