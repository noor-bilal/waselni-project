<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Trip;
use Illuminate\Http\Request;

class employeeTripController extends Controller
{
    public function index(){

        $title=__('lang.trip_information');
        $trip=Trip::with('bus')
            ->where('bus_id',admin()->user()->bus_id)
            ->where('status',1)
            ->first();

        $users='';
        if (!empty($trip)) {
            $users = Appointment::with('user')
                ->where('trip_id', $trip->id)
                ->get();
        }

        return view('admin.employee_trip.list',compact('title','trip','users'));

    }


    public function change_status($status,$trip_id,$user_id){
        Appointment::where('trip_id',$trip_id)
            ->where('user_id',$user_id)
            ->update([
               'status'=>$status,
            ]);


        return back();
    }
}
