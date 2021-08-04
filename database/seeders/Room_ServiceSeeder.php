<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Room_Service;

class Room_ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Room_Service::factory(5)->create();
    }
}
