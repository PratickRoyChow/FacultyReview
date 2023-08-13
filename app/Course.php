<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'courses';

    protected $fillable = [
        'id', 'course_code', 'course_name', 'dept_id', 'student_id', 'published' 
    ];
}
