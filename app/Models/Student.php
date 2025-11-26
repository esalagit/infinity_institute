<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
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
    'grade',
    'class'
];
}
