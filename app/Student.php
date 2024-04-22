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
}
