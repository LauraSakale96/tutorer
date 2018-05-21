<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = [
        'id',
        'filename', 
        'user_id',
        
        
    ];
}
