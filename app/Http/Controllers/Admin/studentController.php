<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

class studentController extends Controller
{
    public function index()
    {
        $title = __('lang.students');
        $students = Student::all();
        return view('admin.student.list', compact('title', 'students'));
    }


    public function get($id = null)
    {
        $title = __('lang.students');
        if ($id > 0) {
            $student = Student::find($id);
            return view('admin.student.form', compact('title', 'student'));
        }
        return view('admin.student.form', compact('title'));
    }


    public function save()
    {
        $data = $this->validate(\request(), [
            'finish_time' => 'required',
            'student_count' => 'required',
        ],[],[
            'finish_time'=>__('lang.finish_time'),
            'student_count'=>__('lang.student_count')
        ]);

        $id = \request('id');

        if ($id > 0) {
            Student::find($id)->update($data);
            alert(__('lang.success'), __('lang.success_save'), 'success');
            return redirect('admin/student');
        }


        Student::create($data);
        alert(__('lang.success'), __('lang.success_save'), 'success');
        return redirect('admin/student');
    }

    public function delete($id)
    {
        Student::find($id)->delete();
        alert(__('lang.success'), __('lang.success_delete'), 'success');
        return back();
    }


}
