<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'lastname', 
        'age',
        'gender',
        'user_id',
        'subject_id',
    ];
    public function user(){
        return $this->belongsToMany('App\User');
    }
    public function subject(){
        return $this->belongsTo('App\Subject');
    }

    
    
}
