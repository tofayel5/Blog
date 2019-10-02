<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public const ROLE_ADMIN = "Admin";
    public const ROLE_AUTHOR = "Author";
    public function users(){
        return $this->hasMany('App\User');
    }
}
