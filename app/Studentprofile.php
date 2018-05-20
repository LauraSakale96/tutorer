<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Studentprofile extends Model
{
    protected $fillable = [
        'name', 
        'lastname',
        'age',
        'school',
        'description',
        'image',
        'user_id'
    ];
    
}