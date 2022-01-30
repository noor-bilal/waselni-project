<?php

if (!function_exists("avatar")) {
    function avatar($path = '')
    {
        return asset('avatar' .DIRECTORY_SEPARATOR. $path);
    }
}

if (!function_exists("theme")) {
    function theme($path = '')
    {
        return asset('theme' . DIRECTORY_SEPARATOR. $path);
    }
}


if (!function_exists("admin")) {
    function admin()
    {
        return auth()->guard('admin');
    }
}


if (!function_exists("direction")) {
    function direction()
    {
        if (session()->has('lang')) {
            return session('lang');
        } else {
            return 'ar';
        }
    }
}



if (!function_exists("available_seats")) {
    function available_seats($bus_id,$trip_id)
    {
        $number_of_seats=\App\Models\Bus::find($bus_id)->number_of_seats;

        $appointments=\App\Models\Appointment::where('trip_id',$trip_id)
            ->count();

        return $number_of_seats - $appointments;
    }
}
