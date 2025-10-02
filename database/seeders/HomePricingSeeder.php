<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\HomePricing;

class HomePricingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        HomePricing::create([
            'heading' => 'Pricing Packages',
            'description' => 'Choose the best pricing package that suits your needs and budget.',
            'how_many' => 3,
            'status' => 'Show'
        ]);
    }
}
