<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(MobileTableSeeder::class);
         $this->call(FeatureTableSeeder::class);
         $this->call(StatusSolicitudeTableSeeder::class);
    }
}
