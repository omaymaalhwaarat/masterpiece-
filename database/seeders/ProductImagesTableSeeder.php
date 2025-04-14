<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\ProductImage;

class ProductImagesTableSeeder extends Seeder
{
    public function run()
    {
        ProductImage::create([
            'product_id' => 1, // Sunscreen
            'image_path' => 'sunscreen.png',
        ]);

        ProductImage::create([
            'product_id' => 2, // Face Moisturizer
            'image_path' => 'images/products/mosturize.png',
        ]);

        ProductImage::create([
            'product_id' => 3, // deoderant
            'image_path' => 'images/products/deoderant.png',
        ]);

        ProductImage::create([
            'product_id' => 4, // Hair serum
            'image_path' => 'images/products/Hair serum.png',
        ]);
        ProductImage::create([
            'product_id' => 5, // Deodorant with Strawberry
            'image_path' => 'images/products/deoderantstraberry.png',
        ]);
        
         ProductImage::create([
            'product_id' => 6, // Deodorant with Apple
            'image_path' => 'images/products/deoderantapple.png',
        ]);

        ProductImage::create([
            'product_id' => 7, // Deodorant with lemon
            'image_path' => 'images/products/deoderantlemon.png',
        ]);
        ProductImage::create([
            'product_id' => 8, // lipstick
            'image_path' => 'images/products/lipstick.png',
        ]);
    }
}