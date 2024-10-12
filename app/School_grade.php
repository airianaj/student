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


    public function students() {
        return $this->belongsTo(Student::class);
    }
}
