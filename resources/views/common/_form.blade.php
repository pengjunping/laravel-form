{{--<form method="post" action="{{ url('student/save') }}">--}}
<form method="post" action="">

    {{--Laravel框架中有此要求
        任何指向 web 中 POST, PUT 或 DELETE 路由的 HTML 表单请求都应该包含一个 CSRF 令牌(CSRF token)，
        否则，这个请求将会被拒绝。
    --}}

    {{ csrf_field() }}

    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text">姓名</span>
        </div>
        <div class="col-md-6">
            <input type="text" name="Student[name]"
                   value="{{ old('Student')['name'] ? old('Student')['name'] : $students->name }}"
                   class="form-control" id="name" placeholder="请输入姓名">
        </div>
        <div class="col-md-5 text-danger">{{ $errors->first('Student.name') }}</div>
    </div>

    <br>

    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text">年龄</span>
        </div>
        <div class="col-md-6">
            <input type="text" name="Student[age]"
                   value="{{ old('Student')['age'] ? old('Student')['age'] : $students->age }}"
                   class="form-control" id="age" placeholder="请输入年龄">
        </div>
        <div class="col-md-5 text-danger">{{ $errors->first('Student.age') }}</div>
    </div>

    <br>

    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text">性别</span>
        </div>
        <div class="col-md-6">

            @foreach($students->getSex() as $key=>$val)
                <label class="radio-inline">
                    <input type="radio" name="Student[sex]"
                           {{ isset($students->sex) && $students->sex == $key ? 'checked':''}}
                           value="{{ $key }}">{{ $val }}
                </label>
            @endforeach

        </div>
        <div class="col-md-5 text-danger">{{ $errors->first('Student.sex') }}</div>
    </div>

    <br>
    <div class="input-group">

        <div class="col-md-6">
            <input type="submit" class="btn btn-primary" value="提交"></button>
        </div>

    </div>
</form>