<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'id_category' => '1',
            'name' => 'After Hours',
            'price' => 179000,
            'description' => 'Album by The Weeknd',
            'stock' => '30',
            'image' => 'release_202002_ab67616d0000b27380e1e80874a5b25317c380c5.jpg'
        ]);

        Product::create([
            'id_category' => '1',
            'name' => 'Sour',
            'price' => 179000,
            'description' => 'Album by Olivia Rodrigo',
            'stock' => '34',
            'image' => 'artwork-440x440-1-compressed.jpg'
        ]);

        Product::create([
            'id_category' => '3',
            'name' => 'Scorpion',
            'price' => 299000,
            'description' => 'Album by Drake',
            'stock' => '99',
            'image' => 'drake-scorpion.jpg'
        ]);
        
        Product::create([
            'id_category' => '2',
            'name' => 'A Head Full of Dreams',
            'price' => 199000,
            'description' => 'Album by Coldplay',
            'stock' => '7',
            'image' => 'AHFOD1000.jpg'
        ]);
    }
}
