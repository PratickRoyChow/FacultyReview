<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';

    protected $fillable = [
        'comment_id', 'student_id', 'comment', 'faculty_id', 'created_at', 'updated_at'
    ];
}
