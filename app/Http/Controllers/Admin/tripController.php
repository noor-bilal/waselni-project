<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bus;
use App\Models\Trip;
use Illuminate\Http\Request;

class tripController extends Controller
{
    public function index(){
        $title=__('lang.trips');
        $trips=Trip::with('bus')->get();
        return view('admin.trip.list',compact('title','trips'));
    }

    public function get($id=null){
        $title=__('lang.trip_information');
        $buses=Bus::all();
        if ($id > 0){
            $trip=Trip::find($id);
            return view('admin.trip.form',compact('title','trip','buses'));
        }
        return view('admin.trip.form',compact('title','buses'));
    }

    public function save(){
        $data=$this->validate(\request(),[
            'bus_id'=>'required',
            'trip_date'=>'required',
            'status'=>'required',
        ],[],[
            'bus_id'=>__('lang.bus'),
            'trip_date'=>__('lang.trip_date'),
            'status'=>__('lang.status'),
        ]);

        $id=\request('id');
        if ($id >0){
            Trip::find($id)->update($data);
            alert(__('lang.success'),__('lang.success_save'),'success');
            return redirect('admin/trip');
        }

        Trip::create($data);
        alert(__('lang.success'),__('lang.success_save'),'success');
        return redirect('admin/trip');
    }

    public function delete($id){
        Trip::find($id)->delete();
        alert(__('lang.success'),__('lang.success_delete'),'success');
        return back();
    }
}
