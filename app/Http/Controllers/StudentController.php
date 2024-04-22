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
        $query = \App\Student::query();
        // 全件取得 +ページネーション
        $students = $query->orderBy('id','desc')->paginate(10);
        return view('index')
        ->with ('page_id',request()->page)
        ->with('students',$students);
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
        $request->validate([   
            'grade'=> 'required|integer',
            'name' => 'required|max:20',
            'addres' => 'required|max:50',
            //'img_path' => 'required',
            'comment' => 'required|max:140',
        ]);
    
        

        $student = new Student;
            $student->grade = $request->input("grade");
            $student->name = $request->input("name");
            $student->addres = $request->input("addres");
            $student->comment = $request->input("comment");
            $student->img_path = $request->input("img_path");
            $student->save();

            return redirect()->route('students.index')->with("success", '登録しました');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        $students = Student::all();
        return view('show',compact('student'))
        ->with ('page_id',request()->page);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        $studets = Student::all();
        return view('edit',compact('student'));
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
        $request->validate([   
            'grade'=> 'required|integer',
            'name' => 'required|max:20',
            'addres' => 'required|max:50',
            //'img_path' => 'required',
            'comment' => 'required|max:140',
        ]);
    
        
            $student->grade = $request->input("grade");
            $student->name = $request->input("name");
            $student->addres = $request->input("addres");
            $student->comment = $request->input("comment");
            $student->img_path = $request->input("img_path");
            $student->save();

            return redirect()->route('students.index')->with("success", '登録しました');
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
        ->with('success','学生'.$student->name.'を削除しました');
    }
}
