<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Trip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class MypointController extends Controller
{
    public function my_point(){

        $title=__('lang.my_point');


        $total_point=Appointment::where('user_id',auth()->user()->id)
            ->where('status','finished')
            ->sum('user_point');


        $cancel_trip=Appointment::where('user_id',auth()->user()->id)
            ->where('status','cancel')
            ->count();


        $finish_trip=Appointment::where('user_id',auth()->user()->id)
            ->where('status','finished')
            ->count();


        $pending_trip=Appointment::where('user_id',auth()->user()->id)
            ->where('status','pending')
            ->count();



        $appointments=Appointment::where('user_id',auth()->user()->id)->get();


        return view('user.my_point.point',compact('title','appointments','total_point','pending_trip','cancel_trip','finish_trip'));
    }



    public function cancel_appointment($appointment_id){
        Appointment::find($appointment_id)
            ->update([
               'status'=>'cancel'
            ]);

    }
}
