<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    protected $table = 'majors';

    protected $fillable = [
        'id', 'major_name', 'dept_id', 'created_at', 'updated_at' 
    ];
}
