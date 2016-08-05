<?php

use Illuminate\Database\Seeder;
use App\Mobile;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class MobileTableSeeder extends Seeder {

    public function run()
    {
        $phones = ['iPhone 4', 'iPhone 4S', 'iPhone 5', 'iPhone 5C', 'iPhone 5S', 'iPhone 5E', 'iPhone 6', 'iPhone 6 Plus', 'iPhone 6S', 'iPhone 6S Plus', 'Macbook', 'Macbook Pro', 'iMac', 'iPad 2', 'iPad 3', 'iPad 4', 'iPad Mini'];
        foreach ($phones as &$phone) {
            Mobile::create([
                'name' => $phone
            ]);
        }

    }

}