<?php
/**
 * Created by 2018/10/31.
 */

namespace App\Http\Controllers;


use App\Student;
use \Illuminate\Support\Facades\Validator;
use \Illuminate\Http\Request;

class StudentController extends Controller
{
    # 学生首页
    public function index()
    {
        $students = Student::paginate(10);

        return view('student.index', [
            'students' => $students
        ]);
    }

    # 新增学生信息
    public function create(Request $request)
    {
        # 保存学生信息 方法2
        if ($request->isMethod('POST')) {

            # 1.控制器验证
            /*
            $this->validate($request,[
               'Student.name' => 'required|min:2|max:20',
               'Student.age' => 'required|integer',
               'Student.sex' => 'required|integer',
            ],[
                'required'=>':attribute 为必填项',
                'min'=>':attribute 最小长度为2',
                'max'=>':attribute 最大长度为20',
                'integer'=>':attribute 必须为整数 ',
            ],[
                'Student.name'=>'姓名',
                'Student.age'=>'年龄',
                'Student.sex'=>'性别',
            ]);
            */

            # 2. Validator类验证
            $validator = Validator::make($request->input(), [
                'Student.name' => 'required|min:2|max:20',
                'Student.age' => 'required|integer',
                'Student.sex' => 'required|integer',
            ], [
                'required' => ':attribute 为必填项',
                'min' => ':attribute 最小长度为2',
                'max' => ':attribute 最大长度为20',
                'integer' => ':attribute 必须为整数 ',
            ], [
                'Student.name' => '姓名',
                'Student.age' => '年龄',
                'Student.sex' => '性别',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }


            $data = $request->input('Student');
            if (Student::create($data)) {
                return redirect('student/index')->with('success', '添加成功！');
            } else {
                return redirect()->back();
            }
        }

        $student = new Student();

        return view('student.create', [
            'students' => $student
        ]);
    }

    # 保存学生信息 方法1
    public function save(Request $request)
    {
        $data = $request->input('Student');
        $student = new Student();
        $student->name1 = $data['name'];
        $student->age1 = $data['age'];
        $student->sex1 = $data['sex'];

        if ($student->save()) {
            return redirect('student/index');
        } else {
            return redirect()->back();
        }
    }

    # 更新学生信息
    public function update(Request $request, $id)
    {

        $student0 = Student::find($id);

        if ($request->isMethod('POST')) {

            # 验证信息
            $this->validate($request, [
                'Student.name' => 'required|min:2|max:20',
                'Student.age' => 'required|integer',
                'Student.sex' => 'required|integer',
            ], [
                'required' => ':attribute 为必填项',
                'min' => ':attribute 最小长度为2',
                'max' => ':attribute 最大长度为20',
                'integer' => ':attribute 必须为整数 ',
            ], [
                'Student.name' => '姓名',
                'Student.age' => '年龄',
                'Student.sex' => '性别',
            ]);

            $data = $request->input('Student');
            $student0->name = $data['name'];
            $student0->age = $data['age'];
            $student0->sex = $data['sex'];

            if ($student0->save()) {
                return redirect('student/index')->with('success', '学生' . $id . '更新成功！');
            }
        }

        return view('student.update', [
            'students' => $student0
        ]);
    }

    # 学生详细信息
    public function detail($id)
    {

        $student = Student::find($id);
        return view('student.detail', [
            'student' => $student
        ]);
    }

    # 删除信息
    public function delete($id)
    {
        $student = Student::find($id);
        if ($student->delete()) {
            return redirect('student/index')->with('success','删除学生'.$id.'成功！');
        }else{
            return redirect()->back()->with('error','删除失败！');
        }
    }

}