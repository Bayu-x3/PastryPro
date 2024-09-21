<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cart;

class CartSeeder extends Seeder
{
    public function run()
    {
        Cart::create([
            'user_id' => 1,  // Ganti dengan ID user yang valid
            'pastry_id' => 1, // Ganti dengan ID pastry yang valid
            'quantity' => 2,
        ]);

        Cart::create([
            'user_id' => 1,  // Ganti dengan ID user yang valid
            'pastry_id' => 2, // Ganti dengan ID pastry yang valid
            'quantity' => 1,
        ]);
    }
}
