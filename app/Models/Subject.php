<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $fillable=[
        'ccode',
        'subid1',
        'subname1',
         'subid2',
        'subname2',
        'subid3',
        'subname3',
        'subid4',
        'subname4'
    ];

}
