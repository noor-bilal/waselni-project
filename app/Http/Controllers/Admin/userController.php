<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class userController extends Controller
{
    public function index(){
        $title=__('lang.users');
        $users=User::all();
        return view('admin.user.list',compact('title','users'));
    }

    public function change_status($status,$user_id){

        User::find($user_id)->update([
           'is_active'=>$status
        ]);
        if ($status ==0){
            alert(__('lang.success'),__('lang.success_change_status_to_inactive'),'success');

        }else{
            alert(__('lang.success'),__('lang.success_change_status'),'success');
        }
        return back();
    }
}
