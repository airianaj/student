<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $students = Student::getAllStudents(10);

        return view('index')
            ->with('page_id', request()->page)
            ->with('students', $students);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'grade' => 'required|integer',
            'name' => 'required|max:20',
            'addres' => 'required|max:50',
            'comment' => 'required|max:140',
            'img_path' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // 画像ファイルを保存
        if ($request->hasFile('img_path')) {
        // storage/app/public/images に画像を保存し、パスを取得
        $imagePath = $request->file('img_path')->store('images', 'public');
        $data['img_path'] = $imagePath;
        }

        // モデルを使って学生データを作成
        Student::createStudent($data);

        return redirect()->route('student.create')->with("success", '登録しました');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        return view('show', compact('student'))
            ->with('page_id', request()->page);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        return view('edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $data = $request->validate([
            'grade' => 'required|integer',
            'name' => 'required|max:20',
            'addres' => 'required|max:50',
            'comment' => 'required|max:140',
            'img_path' => 'required',
        ]);

        // モデルのインスタンスを使って更新
        $student->updateStudent($data);

        return redirect()->route('student.edit', compact('student'))->with("success", '更新しました');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')
            ->with('success', '学生' . $student->name . 'を削除しました');
    }
}
