<?php

namespace Database\Seeders;

use App\Models\Option;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Option::create([
            'key' => 'app_name',
            'value' => 'Jigear',
        ]);

        Option::create([
            'key' => 'shipping_fee',
            'value' => 2,
        ]);

        Option::create([
            'key' => 'currency',
            'value' => '$',
        ]);
    }
}
