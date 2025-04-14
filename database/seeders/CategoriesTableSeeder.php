<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
        Category::create(['name' => 'Skin Care']);
        Category::create(['name' => 'Body Care']);
        Category::create(['name' => 'Hair Care']);
        Category::create(['name' => 'Makeup']);
    }
}