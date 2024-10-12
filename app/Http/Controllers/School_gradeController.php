<?php

namespace App\Http\Controllers;

use App\School_grade;
use Illuminate\Http\Request;

class School_gradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $school_grades = School_grade::All();
        return view('School_grade.index', ['school_grades' => $school_grades]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('grade-create');
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
                'student_id' => 'required|exists:students,id',
                'grade' => 'required|string|max:10',
                'term' => 'required|string|max:10',
                'japanese' => 'required|string|in:A,B,C,D,F',
                'math' => 'required|string|in:A,B,C,D,F',
                'science' => 'required|string|in:A,B,C,D,F',
                'social_studies' => 'required|string|in:A,B,C,D,F',
                'music' => 'required|string|in:A,B,C,D,F',
                'home_economics' => 'required|string|in:A,B,C,D,F',
                'english' => 'required|string|in:A,B,C,D,F',
                'art' => 'required|string|in:A,B,C,D,F',
                'health_and_physical_education' => 'required|string|in:A,B,C,D,F',
            ]);

            $school_grade = new School_grade;
            $school_grade->student_id = $request->input('student_id');
            $school_grade ->grade = $request->input("grade");
            $school_grade ->term = $request->input("term");
            $school_grade ->japanese = $request->input("japanese");
            $school_grade ->math = $request->input("math");
            $school_grade ->science = $request->input("science");
            $school_grade ->social_studies = $request->input("math");
            $school_grade ->music = $request->input("music");
            $school_grade ->home_economics = $request->input("home_economics");
            $school_grade ->english = $request->input("english");
            $school_grade ->art = $request->input("art");
            $school_grade ->health_and_physical_education = $request->input("health_and_physical_education");
            $school_grade ->save();

            return redirect()->route('school_grade.create')->with("success", '登録しました');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $students = Student::all();
        return view('show',compact('school_grade'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}