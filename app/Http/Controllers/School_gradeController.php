<?php

namespace App\Http\Controllers;

use App\School_grade;
use App\Student;
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
        $school_grades = School_grade::getAllGrades();
        $school_grades = School_grade::with('student')->get();
        return view('school_grade.index', ['school_grades' => $school_grades]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $students = Student::all(); 
        //$student = Student::findOrFail($studentId);
        return view('grade-create', ['students' => $students]);
        
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
    

        
        // クエリログを有効化
    //DB::enableQueryLog();

    //try {

        //$data['student_id'] = Auth::user()->student_id;

        // モデルで成績データを新規作成
        $school_grades = School_grade::createGrade($data);

        //dump(DB::getQueryLog());
    //} catch (\Exception $e) {
        // エラー処理
        //\Log::error('保存エラー: ' . $e->getMessage());
        //return back()->withErrors('データの保存中にエラーが発生しました。')->withInput();
    //}
        return redirect()->route('school_grade.create', ['studentId' => $data['student_id']])->with("success", '登録しました');

        //dd($schoolGrade);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // モデルで特定IDの成績データを取得
        $school_grade = School_grade::getGradeById($id);

        return view('school_grade.show', compact('school_grade'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $school_grade = School_grade::getGradeById($id);
        return view('school_grade.edit', compact('school_grade'));
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
        $data = $request->validate([
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

        // モデルで成績データを新規作成
        School_grade::createGrade($data);

        return redirect()->route('grade-create')->with("success", '更新しました');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $school_grade = School_grade::getGradeById($id);
        $school_grade->delete();

        return redirect()->route('school_grade.index')->with("success", '削除しました');
    }
}