<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\HomeCounter;

class HomeCounterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        HomeCounter::create([
            'item1_icon' => 'fa fa-calendar',
            'item1_number' => 120,
            'item1_title' => 'Events',
            'item2_icon' => 'fa fa-user',
            'item2_number' => 50,
            'item2_title' => 'Speakers',
            'item3_icon' => 'fa fa-users',
            'item3_number' => 300,
            'item3_title' => 'Users',
            'item4_icon' => 'fa fa-th-list',
            'item4_number' => 25,
            'item4_title' => 'Categories',
            'status' => 'show'
        ]);
    }
}
