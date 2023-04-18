<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
class FacilitieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $facilities = [
            [
                'name' => 'Swimming Pool',
                'description' => 'Enjoy a refreshing swim in our indoor pool',
                'icon' => 'swimming-pool.png'
            ],
            [
                'name' => 'Fitness Center',
                'description' => 'Stay fit with our state-of-the-art fitness equipment',
                'icon' => 'fitness-center.png'
            ],
            [
                'name' => 'Spa',
                'description' => 'Relax and rejuvenate at our spa',
                'icon' => 'spa.png'
            ],
            [
                'name' => 'Wifi',
                'description' => 'Stay connected with our high-speed Wi-Fi',
                'icon' => 'wifi-icon.ico'
            ],
            [
                'name' => 'TV',
                'description' => 'Watch your favorite shows on our flat-screen TVs',
                'icon' => 'tv_icon.ico'
            ],
            [
                'name' => 'Air Conditioning',
                'description' => 'Stay cool and comfortable with our air conditioning',
                'icon' => 'air_conditioner.ico'
            ],
            [
                'name' => 'Shower',
                'description' => 'Freshen up in our modern showers',
                'icon' => 'douche-icon.ico'
            ],
            [
                'name' => 'Room Heater',
                'description' => 'Stay warm and cozy with our room heaters',
                'icon' => 'roomheater-icon.ico'
            ],
            [
                'name' => 'View',
                'description' => 'Enjoy breathtaking views of the city from your room',
                'icon' => 'viewicon.ico'
            ],
        ];

        foreach ($facilities as $facility) {
            $iconPath = public_path('assets/upload/facilities/' . $facility['icon']);

            // check if the icon file exists before inserting the facility
            if (!File::exists($iconPath)) {
                continue;
            }

            $facilityData = [
                'name' => $facility['name'],
                'description' => $facility['description'],
                'iconF' => $facility['icon']
            ];

            DB::table('facilities')->insert($facilityData);
        }

        
    }
}
