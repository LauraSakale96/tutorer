<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Progress extends Model
{
    
    protected $fillable = [ //aizpildāmie lauki
        'name',
        'description', 
        'date',
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
