<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;



class Student extends Authenticatable
{
    use HasFactory,Notifiable,HasApiTokens;
protected $fillable=[
    'sid',
    'name',
    'address',
    'email',
    'phone1',
    'phone2',
    'nicf',
    'nicb',
    'pphone',
    'course',
    'grade_id',
    'password'
];


    public function gradeview()
    {
        return $this->belongsTo(Grade::class, 'grade_id');
    }





}
