<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $items  = User::where('role',0)->get();
        return view('user',compact('items'));

    }

    public function user_insert(Request $request)
    {
        $validation = Validator::make($request->all(), User::rulesCreate());

        if ($validation->fails())
        {
            session()->flash('error', trans('teknasyon/alert.warning'));
        }
        else
        {
            $password = bcrypt($request->get('password'));
            $request->merge([
                'password' => $password,
                'role' => 0,
            ]);
            User::create($request->all());
            session()->flash('success', trans('teknasyon/alert.insert'));
        }
        return redirect()->back();

    }

    public function user_update(Request $request, $id)
    {
        $user = User::find($id);
        $validation = Validator::make($request->all(), User::rulesUpdate($user->id));

        if ($validation->fails())
        {
            session()->flash('error', trans('teknasyon/alert.warning'));
        }
        else
        {
            User::find($id)->update($request->all());
            session()->flash('update', trans('teknasyon/alert.update'));
        }
        return redirect()->back();
    }
}
