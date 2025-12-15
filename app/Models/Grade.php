<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;

    protected $fillable=[
        'gradeid',
        'gradename',
        'class_id'
    ];

    public function classroom()
    {
        return $this->belongsTo(Classes::class, 'class_id');
    }

    public function grades()
    {

        return $this->hasMany(Student::class , 'grade_id');
    }

}
