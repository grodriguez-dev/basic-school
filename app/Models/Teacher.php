<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'lastname',
        'subject_id'
    ];

    public function subject()
    {
        return $this->belongsTo('App\Models\Subject');
    }

    public function estudents()
    {
        return $this->belongsToMany(
            'App\Models\Estudent', // model
            'estudent_teachers', //table
            'teacher_id', // id
            'estudent_id'// id
        );
    }
}
