<?php

namespace App\Http\Controllers;

use App\Languages;
use App\Projects;
use App\ProjectTranslation;
use App\Version;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProjectsController extends Controller
{
    public function index(Request $request)
    {
        $items  = Projects::all();
        $languages = Languages::where('status',1)->get();
        return view('projects',compact('items','languages'));
    }

    public function projects_insert(Request $request)
    {
        $validation = Validator::make($request->all(), Projects::rulesCreate());

        if ($validation->fails())
        {
            session()->flash('error', trans('teknasyon/alert.warning'));
        }
        else
        {
            Projects::create($request->all());
            session()->flash('success', trans('teknasyon/alert.insert'));
        }
        return redirect()->back();

    }

    public function projects_update(Request $request, $id)
    {
        $projects = Projects::find($id);

        $validation = Validator::make($request->all(), Projects::rulesUpdate($projects->id));

        if ($validation->fails())
        {
            session()->flash('error', trans('teknasyon/alert.warning'));
        }
        else
        {
            Projects::find($id)->update($request->all());
            session()->flash('update', trans('teknasyon/alert.update'));
        }
        return redirect()->back();
    }

    public function lokalizasyon(){


        $projects = Projects::where('status',1)->get();
        $languages = Languages::where('status',1)->get();
        $versions = Version::where('status',1)->get();

        $items = ProjectTranslation::all();

        return view('projects-lang', compact('projects','languages','versions','items'));

    }

    public function lokalizasyon_insert(Request $request){
        $project_id  = $request->get('project_id');
        $version_id  = $request->get('version_id');
        $language_id = $request->get('language_id');
        $key         = $request->get('key');
        $value       = $request->get('value');

        $kosul = ['project_id' => $project_id,'version_id'=>$version_id,'language_id'=>$language_id, 'key'=>$key,'value'=>$value];
        $duplicate = ProjectTranslation::ayni_lokalizasyon_var_mi($kosul)->count();

        if ($duplicate >0) {
            session()->flash('error', trans('teknasyon/alert.warning'));
        }
        else
        {
            ProjectTranslation::create($request->all());
            session()->flash('success', trans('teknasyon/alert.insert'));
        }
        return redirect()->back();
    }
    public function lokalizasyon_update(Request $request, $id)
    {
        $project_id  = $request->get('project_id');
        $version_id  = $request->get('version_id');
        $language_id = $request->get('language_id');
        $key = $request->get('key');
        $value = $request->get('value');
        $kosul = ['project_id' => $project_id,'version_id'=>$version_id,'language_id'=>$language_id, 'key'=>$key,'value'=>$value];
        $duplicate = ProjectTranslation::ayni_lokalizasyon_var_mi($kosul)->count();

        if ($duplicate > 0) {
            session()->flash('error', trans('teknasyon/alert.warning'));
        }
        else
        {
            ProjectTranslation::find($id)->update($request->all());
            session()->flash('update', trans('teknasyon/alert.update'));
        }
        return redirect()->back();
    }
}
