<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $fillable = [
        'name', 
        'description',
        'subject_id',
        'user_id',
        'lessondate',
        'file',
    ];
    public function user(){
        return $this->belongsToMany('App\User');
    }
    public function subject(){
        return $this->belongsTo('App\Subject');
    }
}