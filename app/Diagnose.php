<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diagnose extends Model
{
    protected $fillable = [
        'name', 
        'description',
        'treatment',
        'student_id',
        'user_id',
        
    ];

    public function user(){
        return $this->belongsToMany('App\User');
    }
    public function student(){
        return $this->belongsTo('App\Student');
    }
}