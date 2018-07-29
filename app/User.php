<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password','username','surname','created_by','updated_by','last_login_ip','last_login_at','status','role'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
