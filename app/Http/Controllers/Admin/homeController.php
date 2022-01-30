<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class homeController extends Controller
{
    public function index(){
        $title=__('lang.home');
        return view('admin.home.dashboard',compact('title'));
    }
}
