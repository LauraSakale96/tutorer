<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = [ //aizpildāmie lauki
        'id',
        'filename', 
        'user_id',
        
        
    ];

    public function user(){ //nosaka atkarības
        return $this->belongsToMany('App\User');
    }
}
