<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    
    protected $fillable = [ //aizpildāmie lauki
        'date',
        'attendance', 
        'user_id',
        'student_id',
    ];
    //nosaka atkarības
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function student(){
        return $this->belongsTo('App\Student');
    }

    
    
}
