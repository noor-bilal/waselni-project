<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Bus;
use Illuminate\Http\Request;

class employeeController extends Controller
{
    public function index(){
        $title=__('lang.employees');
        $employees=Admin::with('bus')->where('type','employee')->get();
        return view('admin.employee.list',compact('title','employees'));
    }

    public function get($id=null){
        $title=__('lang.employee_info');
        $buses=Bus::all();
        if ($id > 0){
            $employee=Admin::find($id);
            return view('admin.employee.form',compact('title','employee','buses'));
        }
        return view('admin.employee.form',compact('title','buses'));
    }


    public function save(){
        $data=$this->validate(\request(),[
            'name'=>'required',
            'email'=>'required',
            'mobile'=>'required',
            'bus_id'=>'required',
        ]);

        $data['type']='employee';

        $id=\request('id');

        if ($id == 0){
            $checkBus=Admin::where('bus_id',\request('bus_id'))->count();
            if ($checkBus > 0){
                alert(__('lang.success'),__('lang.error_connect_bus_with_employee'),'error');
                return  back();
            }
        }

        if ($id >0){

            if (!empty(\request('password'))){
                $this->validate(\request(),[
                    'password'=>'required|min:6'
                ]);
                $data['password']=bcrypt(\request('password'));
            }


            Admin::find($id)->update($data);
            alert(__('lang.success'),__('lang.success_save'),'success');
            return redirect('admin/employee');
        }

        if (empty(\request('password'))){
            $this->validate(\request(),[
               'password'=>'required|min:6'
            ]);
        }

        $data['password']=bcrypt(\request('password'));

        Admin::create($data);
        alert(__('lang.success'),__('lang.success_save'),'success');
        return redirect('admin/employee');
    }

    public function delete($id){
        Admin::find($id)->delete();
        alert(__('lang.success'),__('lang.success_delete'),'success');
        return back();

    }
}
