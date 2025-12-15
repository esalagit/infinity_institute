<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
protected $fillable=[
    'courseid',
    'coursename',
    'subject_id'
];

    public function subjectview()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }

}
