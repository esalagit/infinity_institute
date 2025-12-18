<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    protected $fillable=[

        'tid',
        'teachername',
        'address',
        'email',
        'phone1',
        'phone2',
        'nicf',
        'nicb',
        'grade_id',
        'subject_id',
        'password'

    ];

    public function subjects(){
        return $this ->hasMany(Subject::class,'teacher_id');
    }

    public function teachersubject(){
        return $this->belongsTo(Subject::class,'subject_id');
    }

   public function teachergrade(){
        return $this->belongsTo(Grade::class,'grade_id');
   }
}
