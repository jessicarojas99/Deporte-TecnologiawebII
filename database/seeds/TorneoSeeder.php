<?php

use App\Tournament;
use Illuminate\Database\Seeder;

class TorneoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tournament::create([
            'name'=>'Interclubes',
            'startdate'=>'2020-07-12',
            'finishdate'=>'2020-08-12',
        ]);
    }
}
