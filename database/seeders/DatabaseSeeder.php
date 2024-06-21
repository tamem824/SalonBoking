<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Services;
use App\Models\Siting;
use App\Models\AboutUs;
use App\Models\Boking;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        User::factory(10)->create();
        Services::factory(10)->create();
        Siting::factory(10)->create();
        AboutUs::factory(1)->create();
        Boking::factory(10)->create();
    }
}
