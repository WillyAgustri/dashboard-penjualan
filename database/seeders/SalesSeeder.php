<?php

namespace Database\Seeders;

use App\Models\Sales;
use Illuminate\Database\Seeder;

class SalesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Sales::create([
            'product_id' => md5('1'),
            'product_name' => 'Casual-347',
            'picture' => '233',
            'brand' => 'Nike',
            'quantity' => 20000,
            'price' => 2000,
        ]);

        Sales::create([
            'product_id' => md5('2'),
            'product_name' => 'Sport-231',
            'picture' => '233',
            'brand' => 'Adidas',
            'quantity' => 20000,
            'price' => 2000,
        ]);
    }
}