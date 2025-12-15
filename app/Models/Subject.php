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

    ];

    public function courses()
    {

        return $this->hasMany(Course::class , 'subject_id');
    }

}
