<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $fillable=[

        'subjectid',
        'subjectname',
        'teacher_id'

    ];


    public function courses()
    {

        return $this->hasMany(Course::class , 'subject_id');
    }

    public function students(){
        return $this->hasMany(Student::class , 'subject_id');
    }

    public function techname(){
        return $this ->belongsTo(Teacher::class,'teacher_id');
    }

    public function teachers(){
        return $this ->hasMany(Teacher::class,'subject_id');
    }

}
