<?php

namespace App\Http\Controllers;

use App\Languages;
use Illuminate\Http\Request;

class LanguagesController extends Controller
{
    public function index()
    {
        $items  = Languages::all();
        return view('languages',compact('items'));
    }
}
