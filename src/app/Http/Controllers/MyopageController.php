<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyopageController extends Controller
{
    public function profile(){
        return view('profile');
    }
}
