<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use  Illuminate\Support\Facades\Auth;

class Group extends Model
{
    protected $fillable = [
        'name', 'description','is_creator'
    ];
    public function users() {
        return $this->belongsToMany('App\User');
    }

    

    
}
