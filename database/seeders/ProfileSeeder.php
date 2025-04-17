<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Profile;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Profile::create([
            'user_id' => 1,  // Assuming user_id 1
            'firstname' => 'Ahmed',
            'lastname' => 'Mohamed',
            'country' => 'amman',
            'address' => 'amman jabal alweibdeh',
            'city' => 'amman',
            'state' => 'amman Governorate',
            'zip' => '12345',
            'phone' => '+962778778876',
            'email' => 'ahmed@example.com',
        ]);

        Profile::create([
            'user_id' => 2,  // Assuming user_id 2
            'firstname' => 'Sarah',
            'lastname' => 'Ali',
            'country' => 'Saudi Arabia',
            'address' => 'amman',
            'city' => 'amman',
            'state' => 'amman',
            'zip' => '67890',
            'phone' => '+962778778879',
            'email' => 'sara@example.com',
        ]);
        
    }
}