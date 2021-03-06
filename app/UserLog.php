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
    const Login_Event_Warning = "Kullanıcı Girişi başarısız";
    const Version_Event_Add = "Version Eklendi";
    const Login_Event_Update = "Kullanıcı Güncellendi";
    const Version_Event_Update = "Version Güncellendi";
    const Login_Event_Login = "Sistem Girişi Başarılı";
    const Project_Event_Add ="Proje Eklendi";
    const Project_Event_Update = "Proje Güncellendi";
    const Translation_Event_Add = "Lokalizasyon Eklendi";
    const Translation_Event_Update = "Lokalizasyon Güncellendi";

    protected $table = 'user_log';
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
