<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable
{
    use Notifiable;

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
