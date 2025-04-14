<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\OrderItem;

class OrderItemsTableSeeder extends Seeder
{
    public function run()
    {
        OrderItem::create([
            'order_id' => 1, // First order
            'product_id' => 1, // Sunscreen
            'quantity' => 1,
            'price' => 25.99,
        ]);

        OrderItem::create([
            'order_id' => 1, // First order
            'product_id' => 2, // Face Moisturizer
            'quantity' => 1,
            'price' => 18.99,
        ]);

        OrderItem::create([
            'order_id' => 2, // Second order
            'product_id' => 3, // Shower Gel
            'quantity' => 2,
            'price' => 12.99,
        ]);
    }
}