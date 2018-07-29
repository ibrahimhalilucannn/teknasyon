<?php

namespace App\Http\Controllers;

use App\Version;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VersionController extends Controller
{
    public function index(Request $request)
    {
        $items  = Version::all();
        return view('version',compact('items'));

    }

    public function version_insert(Request $request)
    {
        $validation = Validator::make($request->all(), Version::rulesCreate());

        if ($validation->fails())
        {
            session()->flash('error', trans('teknasyon/alert.warning'));
        }
        else
        {
            $create = Version::create($request->all());
            session()->flash('success', trans('teknasyon/alert.insert'));
        }
        return redirect()->back();
    }

    public function version_update(Request $request, $id)
    {
        $version = Version::find($id);

        $validation = Validator::make($request->all(), Version::rulesUpdate($version->id));

        if ($validation->fails())
        {
            session()->flash('error', trans('teknasyon/alert.warning'));
        }
        else
        {
            Version::find($id)->update($request->all());
            session()->flash('update', trans('teknasyon/alert.update'));
        }
        return redirect()->back();
    }
}
