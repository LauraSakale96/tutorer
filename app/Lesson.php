<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $fillable = [ //aizpildāmie lauki
        'name', 
        'description',
        'subject_id',
        'user_id',
        'lessondate',
        'file',
    ];
    //nosaka atkarības
    public function user(){
        return $this->belongsToMany('App\User');
    }
    public function subject(){
        return $this->belongsTo('App\Subject');
    }
}