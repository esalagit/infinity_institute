<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    use HasFactory;
    protected $fillable=[
        'classid',
        'classname'

    ];

    public function grades()
    {
        return $this->hasMany(Grade::class, 'class_id');
    }
}
