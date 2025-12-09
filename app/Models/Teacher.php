<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    protected $fillable=[

        'tid',
        'name',
        'address',
        'email',
        'phone1',
        'phone2',
        'nicf',
        'nicb',
        'course1',
        'course2',
        'subject1',
        'subject2',
        'subject3',
        'grade',
        'class'
    ];
}
