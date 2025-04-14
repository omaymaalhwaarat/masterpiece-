<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Discount;

class DiscountsTableSeeder extends Seeder
{
    public function run()
    {
        Discount::create([
            'code' => 'DISCOUNT10',
            'percentage' => 10,
            'valid_until' => now()->addMonths(1),
        ]);

        Discount::create([
            'code' => 'DISCOUNT20',
            'percentage' => 20,
            'valid_until' => now()->addMonths(2),
        ]);
        Discount::create([
            'code' => 'FREESHIP',
            'percentage' => 50,
            'valid_until' => now()->addMonths(3),
        ]);
    }
}