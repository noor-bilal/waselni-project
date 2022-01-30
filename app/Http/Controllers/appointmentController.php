<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Bus;
use App\Models\Setting;
use App\Models\Trip;
use Illuminate\Http\Request;

class appointmentController extends Controller
{
    public function index(){
        $title=__('lang.appointment');

        $trips=Trip::with('bus')
            ->where('status',1)
            ->get();


        if (\request()->has('search')){
            $search=\request('search');

            $trips=Trip::with('bus')->whereHas('bus',function ($q) use($search){
                $q->where('name_ar', 'like', '%'.$search.'%')
                    ->orWhere('name_en', 'LIKE', "%{$search}%");
            })
                ->where('status',1)
                ->get();

        }

        $total_point=Appointment::where('user_id',auth()->user()->id)
            ->where('status','finished')
            ->sum('user_point');
        $number_of_point_to_free=Setting::select('number_of_point_to_free')->first()->number_of_point_to_free;
        $number_of_point_to_offer=Setting::select('number_of_point_to_offer')->first()->number_of_point_to_offer;
        return view('user.appointment.search',compact('title','trips','total_point','number_of_point_to_free','number_of_point_to_offer'));
    }


    public function bus_info(){
        $bus_id=\request('bus_id');
        $trip_id=\request('trip_id');
        $bus=Bus::with(['area','bus_areas'])->find($bus_id);
        $bus['available_seats']=available_seats($bus_id,$trip_id);

        return response()->json($bus);
    }

    public function do_appointment(){

        if (empty(\request('area_id'))){
            alert(__('lang.error'),__('lang.error_appointment_select_area'),'error');
            return back();
        }


        $data=$this->validate(\request(),[
           'trip_id'=>'required',
           'area_id'=>'required',
        ]);

        $data['user_id']=auth()->user()->id;
        $data['user_point']=Bus::find(\request('bus_id'))->point;
        $data['status']='pending';

        if (\request()->has('offer')){

            if (\request('offer') == 'free'){
                $data['offer_type']="free";
                $number_of_point_to_free=Setting::select('number_of_point_to_free')->first()->number_of_point_to_free;
                $data['user_point']= -$number_of_point_to_free;
            }

            if (\request('offer') == 'discount'){
                $data['offer_type']="discount";
                $number_of_point_to_offer=Setting::select('number_of_point_to_offer')->first()->number_of_point_to_offer;
                $data['user_point']= -$number_of_point_to_offer;
            }

        }

        Appointment::create($data);

        $trip_id=\request('trip_id');

        $check_available_to_change_status=available_seats(\request('bus_id'),$trip_id);
        if ($check_available_to_change_status == 0){
            Trip::find($trip_id)->update([
               'status'=>0
            ]);

            Appointment::where('trip_id',$trip_id)
                ->where('status','pending')
                ->update([
                   'status'=>'finished'
                ]);

        }

        alert(__('lang.success'),__('lang.success_do_appointment'),'success');
        return  redirect('my_point');


    }

}
