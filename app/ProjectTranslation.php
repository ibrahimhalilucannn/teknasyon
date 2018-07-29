<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProjectTranslation extends Model
{
    protected $table = 'project_translation';
    protected $fillable = [
        'project_id','key','value','version_id','language_id','created_by','updated_by'
    ];

    static public function boot()
    {
        parent::boot();
        static::creating(function($model) {
            $user_id = Auth::user()->id;
            $model->created_by = $user_id;
        });
        static::created(function($model) {
            UserLog::log(Auth::user()->id, UserLog::Type_Add, UserLog::Translation_Event_Add);
        });
        static::updating(function($model) {
            $user_id = Auth::check();
            $model->updated_by = $user_id;
            UserLog::log(Auth::user()->id, UserLog::Type_Update, UserLog::Translation_Event_Update);
        });
    }

    public function project()
    {
        return $this->belongsTo('App\Projects', 'project_id');
    }
    public function version()
    {
        return $this->belongsTo('App\Version', 'version_id');
    }
    public function language()
    {
        return $this->belongsTo('App\Languages', 'language_id');
    }

    public function scopeAyni_lokalizasyon_var_mi($query, $kosul) {
        $count = DB::table('project_translation')->where($kosul);
        return $count;
    }

}
