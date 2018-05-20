<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = [
        'id',
        'name', 
        'description',
        'user_id',
        'teacherprofile_id',
        'studentprofile_id',
    ];
    public function user(){
        return $this->belongsTo('App\User');
    }

    
}
