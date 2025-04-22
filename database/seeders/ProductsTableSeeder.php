<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductsTableSeeder extends Seeder
{
    public function run()
    {
        // إضافة المنتجات السابقة
        Product::create([
            'name' => 'Sunscreen SPF 50',
            'description' => 'High protection sunscreen for the skin.',
            'price' => 25.99,
            'stock' => 100,
            'category_id' => 1, // Skin Care
            'discount_id' => 1, // DISCOUNT10
            'sales_count' => 0,
            'how_to_use' => 'Apply generously to all exposed skin 15 minutes before sun exposure. Reapply every 2 hours or after swimming or sweating.',
        ]);

        Product::create([
            'name' => 'Face Moisturizer',
            'description' => 'Hydrating and nourishing moisturizer for the face.',
            'price' => 18.99,
            'stock' => 150,
            'category_id' => 1, // Skin Care
            'discount_id' => 2, // DISCOUNT20
            'sales_count' => 0,
            'how_to_use' => 'Apply a small amount to clean, dry skin. Massage gently until fully absorbed. Use daily for best results.',
        ]);

        Product::create([
            'name' => 'Deodorant',
            'description' => 'Stay fresh and confident all day long with Sara\'s Deodorant. Our formula is designed 
            to provide long-lasting protection against odor while keeping your skin soft and smooth. Infused with 
            natural ingredients, it delivers a refreshing scent that revitalizes and helps you feel your best. Whether you\'re
             heading to the gym or enjoying a busy day, Sara Deodorant keeps you feeling fresh, dry, and protected from morning until night.',
            'price' => 12.99,
            'stock' => 200,
            'category_id' => 2, // Body Care
            'discount_id' => null, // No discount
            'sales_count' => 30,
            'how_to_use' => 'Apply to clean, dry underarms. Allow to dry before dressing. Reapply as needed throughout the day for freshness.',
        ]);

        Product::create([
            'name' => 'Hair Serum',
            'description' => 'Sara Hair Serum Shine, Smoothness & Strength

Unlock the secret to healthier, shinier, and stronger hair with Sara Hair Serum. This lightweight, nourishing formula is 
designed to deeply hydrate your hair while protecting it from environmental stressors and damage. Infused with a blend of natural oils,
 it smoothens frizz, adds a brilliant shine, and leaves your hair feeling silky-soft. Perfect for all hair types, Sara Hair Serum provides long-lasting moisture,
  making your hair look radiant and feel effortlessly smooth.',
            'price' => 19.99,
            'stock' => 50,
            'category_id' => 3, // Hair Care
            'discount_id' => 1, // DISCOUNT10
            'sales_count' => 20,
            'how_to_use' => 'Apply a small amount to damp or dry hair, focusing on the ends. Style as desired. Use daily for best results.',
        ]);

        // إضافة منتجات جديدة
        Product::create([
            'name' => 'Deodorant with Strawberry',
            'description' => 'Sara\'s Strawberry Deodorant brings a refreshing fruity scent to keep you feeling fresh all day. Infused with natural strawberry extract, this deodorant provides long-lasting protection against odor while keeping your skin soft and smooth.',
            'price' => 14.99,
            'stock' => 150,
            'category_id' => 2, // Body Care
            'discount_id' => null, // DISCOUNT20
            'sales_count' => 0,
            'how_to_use' => 'Apply to clean, dry underarms. Allow to dry before dressing. Reapply as needed throughout the day for freshness.',
        ]);

        Product::create([
            'name' => 'Deodorant with Apple',
            'description' => 'Experience the fresh, crisp scent of Sara\'s Apple Deodorant. Designed to provide long-lasting protection against odor, it keeps your skin feeling fresh and smooth with the invigorating fragrance of green apples.',
            'price' => 14.99,
            'stock' => 150,
            'category_id' => 2, // Body Care
            'discount_id' => 2, // DISCOUNT20
            'sales_count' => 2,
            'how_to_use' => 'Apply to clean, dry underarms. Allow to dry before dressing. Reapply as needed throughout the day for freshness.',
        ]);

        Product::create([
            'name' => 'Deodorant with Lemon',
            'description' => 'Sara\'s Lemon Deodorant delivers a zesty, refreshing scent to keep you feeling fresh all day. With its natural lemon extract, this deodorant offers effective odor protection and keeps your skin soft, smooth, and invigorated.',
            'price' => 14.99,
            'stock' => 150,
            'category_id' => 2, // Body Care
            'discount_id' => 2, // DISCOUNT30
            'sales_count' => 3,
            'how_to_use' => 'Apply to clean, dry underarms. Allow to dry before dressing. Reapply as needed throughout the day for freshness.',
        ]);
        Product::create([
            'name' => 'Lipstick',
            'description' => 'Sara Lipstick offers a smooth, rich color with a matte finish that lasts all day. Infused with moisturizing ingredients, this lipstick hydrates your lips while providing a bold and vibrant color. Perfect for any occasion.',
            'price' => 12.99,
            'stock' => 200,
            'category_id' => 4, // Make-Up Products
            'discount_id' => 3, // DISCOUNT50
            'sales_count' => 100,
            'how_to_use' => 'Apply directly to lips for a bold, matte finish. For a more precise application, use a lip brush. Reapply as needed throughout the day.',
        ]);
        
    }
}