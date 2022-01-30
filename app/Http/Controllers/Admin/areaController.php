<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Area;
use Illuminate\Http\Request;

class areaController extends Controller
{
    public function index(){
        $title=__('lang.areas');
        $areas=Area::all();
        return view('admin.area.list',compact('title','areas'));
    }

    public function get($id=null){
        $title=__('lang.area_information');
        if ($id > 0){
            $area=Area::find($id);
            return view('admin.area.form',compact('title','area'));
        }
        return view('admin.area.form',compact('title'));
    }

    public function save(){
        $data=$this->validate(\request(),[
            'name_ar'=>'required',
            'name_en'=>'required',
        ],[],[
            'name_ar'=>__('lang.name_ar'),
            'name_en'=>__('lang.name_en'),
        ]);

        $id=\request('id');
        if ($id >0){
            Area::find($id)->update($data);
            alert(__('lang.success'),__('lang.success_save'),'success');
            return redirect('admin/area');
        }

        Area::create($data);
        alert(__('lang.success'),__('lang.success_save'),'success');
        return redirect('admin/area');
    }

    public function delete($id){
        Area::find($id)->delete();
        alert(__('lang.success'),__('lang.success_delete'),'success');
        return back();
    }
}



















