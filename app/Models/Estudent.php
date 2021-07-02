<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudent extends Model
{
    use HasFactory;

    protected $fillable =[
        'name',
        'lastname',
        'semester'
    ];

    public function teachers()
    {
        return $this->belongsToMany(
            'App\Models\Teacher', // model
            'estudent_teachers', //table
            'estudent_id', // id
            'teacher_id' // id
        );
    }
}
