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

    public function teachers(){
        return $this->hasMany(Teacher::class,'grade_id');
    }



}
