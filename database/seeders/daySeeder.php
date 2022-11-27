<?php

namespace Database\Seeders;

use App\Models\Day;
use Illuminate\Database\Seeder;

class daySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Day::create(['name' => 'saturday']);
        Day::create(['name' => 'sunday']);
        Day::create(['name' => 'monday']);
        Day::create(['name' => 'tuesday']);
        Day::create(['name' => 'wednesday']);
        Day::create(['name' => 'thursday']);
        Day::create(['name' => 'friday']);
    }
}
