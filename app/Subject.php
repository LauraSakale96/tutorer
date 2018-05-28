<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = [ //aizpildāmie lauki
        'id',
        'name', 
        'description',
        'user_id',
        
    ];
    //nosaka atkarības
    public function user(){
        return $this->belongsTo('App\User');
    }

    
}
