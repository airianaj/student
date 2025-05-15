<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School_grade extends Model
{

    protected $fillable = [
        'student_id',
        'grade',
        'term',
        'japanese',
        'math',
        'science',
        'social_studies',
        'music',
        'home_economics',
        'english',
        'art',
        'health_and_physical_education'
    ];


    public function student() {
        return $this->belongsTo(Student::class);
    }

    /**
     * 全ての成績を取得
     */
    public static function getAllGrades()
    {
        return self::with('student')->get();
    }

    /**
     * 特定のIDの成績を取得
     */
    public static function getGradeById($id)
    {
        return self::with('student')->findOrFail($id);
    }


    /**
     * 成績を新規作成
     */
    public static function createGrade($data)
    {
        return self::create($data);
    }

    /**
     * 成績を更新
     */
    public function updateGrade($data)
    {
        return $this->update($data);
    }

    /**
     * 成績を削除
     */
    public function deleteGrade()
    {
        return $this->delete();
    }
}
