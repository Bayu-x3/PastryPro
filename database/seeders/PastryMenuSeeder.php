<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PastryMenu;

class PastryMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PastryMenu::create([
            'name' => 'Croissant Cheese',
            'description' => 'Delicious cheese cake with rich frosting.',
            'price' => 100000,
            'image' => 'image.jpg',
        ]);

        PastryMenu::create([
            'name' => 'Strawberry Cheese Cream',
            'description' => 'Soft and fluffy cupcake with cream topping.',
            'price' => 20000,
            'image' => 'image.jpg',
        ]);

    }
}
