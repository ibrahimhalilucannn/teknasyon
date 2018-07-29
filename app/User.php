<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password','username','surname','created_by','updated_by','last_login_ip','last_login_at','status','role'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    static public function boot()
    {
        parent::boot();
        static::creating(function($model) {
            $user_id = Auth::user()->id;
            $model->created_by = $user_id;
        });
        static::created(function($model) {
            UserLog::log(Auth::user()->id, UserLog::Type_Add, UserLog::Login_Event_Add);
        });
        static::updating(function($model) {
            $user_id = Auth::check();
            $model->updated_by = $user_id;
            UserLog::log(Auth::user()->id, UserLog::Type_Update, UserLog::Login_Event_Update);
        });
    }

    public static function rulesCreate()
    {
        return array(
            'username'              => 'required',
            'name'                  => 'required',
            'surname'               => 'required',
            'email'                 => 'required|email|unique:users,email',
            'password'              => 'required|between:6,10',
        );
    }

    public static function rulesUpdate($id)
    {
        return array(
            'username'              => 'required',
            'name'                  => 'required',
            'surname'               => 'required',
            'email'                 =>  'required|email|unique:users,email,'.$id
        );
    }
}
