<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => Hash::make('1234'),
            'phone' => '+880123456789',
            'address' => '123 Main Street',
            'country' => 'Bangladesh',
            'state' => 'Dhaka',
            'city' => 'Dhaka',
            'zip' => '1000',
            'photo' => 'default.png',
            'token' => '',
            'status' => 1,
        ]);

        User::create([
            'name' => 'Jane Smith',
            'email' => 'jane@example.com',
            'password' => Hash::make('1234'),
            'phone' => '+880987654321',
            'address' => '456 Park Avenue',
            'country' => 'Bangladesh',
            'state' => 'Chittagong',
            'city' => 'Chittagong',
            'zip' => '4000',
            'photo' => 'default.png',
            'token' => '',
            'status' => 1,
        ]);

        User::create([
            'name' => 'Mike Johnson',
            'email' => 'mike@example.com',
            'password' => Hash::make('1234'),
            'phone' => '+880555666777',
            'address' => '789 Oak Road',
            'country' => 'Bangladesh',
            'state' => 'Sylhet',
            'city' => 'Sylhet',
            'zip' => '3100',
            'photo' => 'default.png',
            'token' => '',
            'status' => 1,
        ]);

        User::create([
            'name' => 'Sarah Wilson',
            'email' => 'sarah@example.com',
            'password' => Hash::make('1234'),
            'phone' => '+880444555666',
            'address' => '321 Pine Street',
            'country' => 'Bangladesh',
            'state' => 'Rajshahi',
            'city' => 'Rajshahi',
            'zip' => '6000',
            'photo' => 'default.png',
            'token' => '',
            'status' => 0,
        ]);

        User::create([
            'name' => 'David Brown',
            'email' => 'david@example.com',
            'password' => Hash::make('1234'),
            'phone' => '+880777888999',
            'address' => '654 Elm Avenue',
            'country' => 'Bangladesh',
            'state' => 'Khulna',
            'city' => 'Khulna',
            'zip' => '9000',
            'photo' => 'default.png',
            'token' => '',
            'status' => 1,
        ]);
    }
}
