<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacherprofile extends Model
{
    protected $fillable = [
        'name', 
        'lastname',
        'subject',
        'education',
        'description',
        'image',
        'user_id',
    ];
    
}