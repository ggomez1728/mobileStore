<?php

use Illuminate\Database\Seeder;
use App\Feature;
// composer require laracasts/testdummy

class FeatureTableSeeder extends Seeder {

    public function run()
    {
        $features = [ 'Rayones', 'No Touch ID', 'No Camara', 'No Enciende', 'No Carga', 'No se Escucha'];
        foreach ($features as &$feature) {
            Feature::create([
                'name' => $feature
            ]);
        }
    }

}