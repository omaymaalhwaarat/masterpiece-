<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Order;

class OrdersTableSeeder extends Seeder
{
    public function run()
    {
        Order::create([
            'user_id' => 1, // Admin User
            'total' => 44.98,
            'status' => 'completed',
        ]);

        Order::create([
            'user_id' => 2, // Normal User
            'total' => 31.98,
            'status' => 'pending',
        ]);
    }
}