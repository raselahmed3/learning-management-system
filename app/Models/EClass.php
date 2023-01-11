<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EClass extends Model
{
    use HasFactory;

    public function homework(){
        return  $this->hasMany(Homework::class);
    }

    public function attendences(){
        return  $this->hasMany(Attendance::class);
    }
    public function notes(){
        return  $this->belongsToMany(Note::class,'class_note','note_id','class_id');
    }

    public function course(){
      return  $this->belongsTo(Course::class,'course_id');
    }
}
