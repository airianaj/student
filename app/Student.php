<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'grade',
        'name',
        'addres',
        'img_path',
        'comment',
    ];

    public function school_grades() {
        return $this->hasMany(School_grade::class);
    }

    // 学生一覧の取得 (ページネーション対応)
    public static function getAllStudents($perPage = 10)
    {
        return self::orderBy('id', 'desc')->paginate($perPage);
    }

    // 新規学生の作成
    public static function createStudent($data)
    {
        return self::create($data);
    }

    // 学生情報の更新
    public function updateStudent($data)
    {
        return $this->update($data);
    }
}
