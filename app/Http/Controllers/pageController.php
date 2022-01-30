<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pageController extends Controller
{
    public function service(){
        return view('user.pages.service');
    }

    public function feature(){
        return view('user.pages.feature');

    }

    public function contact(){
        return view('user.pages.contact');

    }




}
