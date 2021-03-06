<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Projects extends Model
{
    protected $table = 'projects';
    protected $fillable = [
        'name','status','created_by','updated_by'
    ];

    static public function boot()
    {
        parent::boot();
        static::creating(function($model) {
            $user_id = Auth::user()->id;
            $model->created_by = $user_id;
        });
        static::created(function($model) {
            UserLog::log(Auth::user()->id, UserLog::Type_Add, UserLog::Project_Event_Add);
        });
        static::updating(function($model) {
            $user_id = Auth::check();
            $model->updated_by = $user_id;
            UserLog::log(Auth::user()->id, UserLog::Type_Update, UserLog::Project_Event_Update);
        });
    }

    public static function rulesCreate()
    {
        return array(
            'name'          => 'required|unique:projects,name',
        );
    }

    public static function rulesUpdate($id)
    {
        return array(
            'name'          =>  'required|unique:projects,name,'.$id
        );
    }

}
