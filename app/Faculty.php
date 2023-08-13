<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    protected $table = 'faculty';

    protected $fillable = [
        'id', 'initial', 'name', 'bio', 'dept_id', 'student_id', 'published' 
    ];
}
