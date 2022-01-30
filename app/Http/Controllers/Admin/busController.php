<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\Bus;
use App\Models\BusArea;
use Illuminate\Http\Request;

class busController extends Controller
{
    public function index(){
        $title=__('lang.buses');
        $buses=Bus::get();
        return view('admin.bus.list',compact('title','buses'));
    }

    public function get($id=null){

        $title=__('lang.bus_info');
        $areas=Area::all();

        if ($id > 0){

            $bus=Bus::find($id);
            $area_ids = array_values($bus->areas->pluck('area_id')->toArray());
            return view('admin.bus.form',compact('title','bus','areas','area_ids'));
        }
        return view('admin.bus.form',compact('title','areas'));
    }


    public function save(){


        $data=$this->validate(\request(),[
            'name_ar'=>'required',
            'name_en'=>'required',
            'number_of_seats'=>'required',
            'bus_number'=>'required',
            'trip_price'=>'required',
            'point'=>'required',
        ],[],[
            'name_ar'=>__('lang.name_ar'),
            'name_en'=>__('lang.name_en'),
            'number_of_seats'=>__('lang.number_of_seats'),
            'bus_number'=>__('lang.bus_number'),
            'trip_price'=>__('lang.trip_price'),
            'point'=>__('lang.point'),
        ]);

        $id=\request('id');
        $areas=\request('area-data');
        $areas=collect($areas);

        $area_ids=\request('area_id');
        $area_ids=collect($area_ids);


        if ($id >0){
            Bus::find($id)->update($data);
            Bus::find($id);

            BusArea::where('bus_id',$id)->delete();

            $areas=$areas->map(function($area) use ($id) {
                $area['bus_id'] = $id;
                return $area;
            });

            BusArea::insert($areas->toArray());

            foreach ($area_ids as $area_id){
                $check=BusArea::where('area_id',$area_id)
                    ->where('bus_id',$id)
                    ->count();
                if ($check == 0) {
                    BusArea::create([
                        'area_id' => $area_id,
                        'bus_id' => $id,
                    ]);
                }
            }

            alert(__('lang.success'),__('lang.success_save'),'success');
            return redirect('admin/bus');
        }

        $bus=Bus::create($data);

        $areas=$areas->map(function($area) use ($bus) {
            $area['bus_id'] = $bus->id;
            return $area;
        });

        foreach ($area_ids as $area_id){

            $check=BusArea::where('area_id',$area_id)
                ->where('bus_id',$bus->id)
                ->count();

            if ($check == 0){
                BusArea::create([
                    'area_id'=>$area_id,
                    'bus_id'=>$bus->id,
                ]);
            }
        }

        BusArea::insert($areas->toArray());

        alert(__('lang.success'),__('lang.success_save'),'success');
        return redirect('admin/bus');
    }

    public function delete($id){

        BusArea::where('bus_id',$id)->delete();
        Bus::find($id)->delete();

        alert(__('lang.success'),__('lang.success_delete'),'success');
        return back();

    }
}
