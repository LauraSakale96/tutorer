<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diagnose extends Model
{
    protected $fillable = [ //nosaka aizpildāmos laukus
        'name', 
        'description',
        'treatment',
        'student_id',
        'user_id',
        
    ];
    //pievieno atkarības
    public function user(){
        return $this->belongsToMany('App\User');
    }
    public function student(){
        return $this->belongsTo('App\Student');
    }
}