<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class homeController extends Controller
{
    public function index(){
        $title=__('lang.home');
        return view('user.home.dashboard',compact('title'));
    }

    public function about_us(){
        $title=__('lang.about_us');
        $about_us=Setting::select('about_us')->first();
        return view('user.home.about_us',compact('title','about_us'));
    }


}
