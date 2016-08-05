<?php

use App\StatusSolicitude;
use Illuminate\Database\Seeder;

// composer require laracasts/testdummy

class StatusSolicitudeTableSeeder extends Seeder {

    public function run()
    {
        $status = ['Recibido',  'En Revision', 'Listo', 'Entregado'];
        foreach ($status as &$state) {
            StatusSolicitude::create([
                'title' => $state,
                'info'  => 'nil'
            ]);
        }
    }

}