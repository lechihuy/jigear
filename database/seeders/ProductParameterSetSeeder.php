<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductParameterSet;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductParameterSetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $set = ProductParameterSet::create(['key' => 'Laptop']);
        $set->parameters()->createMany([
            ['key' => 'Kích thước'],
            ['key' => 'Cân nặng']
        ]);

        $set = ProductParameterSet::create([
            'key' => 'Chuột'
        ]);
        $set->parameters()->createMany([
            ['key' => 'Kích thước'],
            ['key' => 'Cân nặng']
        ]);

        $set = ProductParameterSet::create([
            'key' => 'Bàn phím'
        ]);
        $set->parameters()->createMany([
            ['key' => 'Kích thước'],
            ['key' => 'Cân nặng']
        ]);
    }
}
