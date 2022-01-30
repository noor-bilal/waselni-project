<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class settingController extends Controller
{
    public function index(){
        $title=__('lang.setting');
        $setting=Setting::find(1);
        return view('admin.setting.setting',compact('title','setting'));
    }


    public function update_setting(){
        $data=$this->validate(\request(),[
           'number_of_point_to_free'=>'required',
           'number_of_point_to_offer'=>'required',
           'offer_percent'=>'required',
           'about_us'=>'required',
        ],[],[
            'number_of_point_to_free'=>__('lang.number_of_point_to_free'),
            'number_of_point_to_offer'=>__('lang.number_of_point_to_offer'),
            'offer_percent'=>__('lang.offer_percent'),
            'about_us'=>__('lang.about_us'),
        ]);

        Setting::find(1)->update($data);
        alert(__('lang.success'),__('lang.success_save'),'success');
        return back();
    }
}
