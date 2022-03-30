<?php

namespace Database\Seeders;

use App\Models\Catalog;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CatalogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $iPhone = Catalog::create([
            'title' => 'iPhone',
            'published' => 1,
            'description' => 'Explore iPhone, the world’s most powerful personal device. Check out iPhone 13 Pro, iPhone 13 Pro Max, iPhone 13, iPhone 13 mini, and iPhone SE.',
        ]);

        $mac = Catalog::create([
            'title' => 'Mac',
            'published' => 1,
            'description' => 'Explore iPhone, the world’s most powerful personal device. Check out iPhone 13 Pro, iPhone 13 Pro Max, iPhone 13, iPhone 13 mini, and iPhone SE.',
        ]);
    }
}
