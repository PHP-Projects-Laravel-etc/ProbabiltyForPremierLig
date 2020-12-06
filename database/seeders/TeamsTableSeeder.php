<?php

namespace Database\Seeders;

use App\Models\Team;
use Illuminate\Database\Seeder;

class TeamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Team::factory()->create(['name' =>'Chealsea']);
        Team::factory()->create(['name' =>'Liverpool']);
        Team::factory()->create(['name' =>'Arsenal']);
        Team::factory()->create(['name' =>'Manchester City']);

    }
}
