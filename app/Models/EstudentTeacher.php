<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EstudentTeacher extends Model
{
    //protected $table = 'estudent_teachers';
    protected $fillable = [
        'estudent_id',
        'teacher_id'
    ];
}