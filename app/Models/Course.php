<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    public function exams(){
        return $this->hasMany(Exam::class);
    }

    public function e_class(){
        return $this->hasMany(EClass::class);
    }
    public function teachers(){
        return $this->belongsToMany(Teacher::class);
    }
    public function courses(){
        return $this->belongsToMany(Course::class);
    }
}
