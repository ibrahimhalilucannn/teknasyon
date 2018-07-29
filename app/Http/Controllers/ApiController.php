<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Exception;

class ApiController extends Controller
{
    public function index($project_id,$version_id, $language_id) {
        $response_data = array();
        $response_code = 200;
        $cache_key = "api_index";
        $response_data = Cache::get($cache_key, null);


        if (!$response_data) {
            try {
                $response_data['items'] = DB::table('project_translation as t1')
                    ->join('projects as t2', 't2.id', '=', 't1.project_id')
                    ->join('version as t3', 't3.id', '=', 't1.version_id')
                    ->join('languages as t4', 't4.id', '=', 't1.language_id')
                    ->where('t2.id',$project_id)
                    ->where('t3.id',$version_id)
                    ->where('t4.id',$language_id)
                    ->select('t2.name as projectName', 't3.name as versionName', 't4.name as languageName', 't4.code as languageCode', 't1.key as key','t1.value as value', 't1.id as id')
                    ->get();
                $expiresAt = Carbon::now()->addMinutes(10);
                Cache::put($cache_key, $response_data, $expiresAt);


            } catch (Exception $ex) {
                $response_code = 500;
            }
        }

        return response()->json(['data' => $response_data]);
    }
}
