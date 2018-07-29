<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class UserLog extends Model
{
    const Type_Add = "Ekleme";
    const Type_Update = "Güncelleme";
    const Type_Login = "Login";
    const Login_Event_Add = "Kullanıcı Eklendi";
    const Version_Event_Add = "Version Eklendi";
    const Login_Event_Update = "Kullanıcı Güncellendi";
    const Version_Event_Update = "Version Güncellendi";
    const Login_Event_Login = "Sistem Girişi Başarılı";

    protected $table = 'user_logs';
    protected $fillable = [
        'user_id','time', 'type','event'
    ];

    static public function log($user_id, $type, $event)
    {
        $l = new UserLog();
        $l->user_id = $user_id;
        $l->type = $type;
        $l->event = $event;
        $l->time = Carbon::now();;
        $l->save();
    }
}
