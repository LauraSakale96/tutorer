<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    
    protected $fillable = [ //aizpildāmie lauki
        'name',
        'lastname', 
        'age',
        'gender',
        'user_id',
        'subject_id',
    ];
    //nosaka atkarības
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function subject(){
        return $this->belongsTo('App\Subject');
    }

    public function progresses()
    {
        return $this->hasMany('App\Progress');
    }

    public function diagnoses()
    {
        return $this->hasMany('App\Diagnose');
    }
    
    
}
