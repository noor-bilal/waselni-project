<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Setting;
use Illuminate\Database\Seeder;

class DefaultInformation extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'name'=>'admin',
            'email'=>'admin@gmail.com',
            'mobile'=>'0799999999',
            'password'=>bcrypt('admin'),
            'image'=>null,
            'type'=>'admin',
        ]);

        Setting::create([
            'number_of_point_to_free'=>5,
            'number_of_point_to_offer'=>2,
            'offer_percent'=>20,
            'about_us'=>'test data',
        ]);
    }
}
