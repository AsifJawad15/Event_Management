<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Accommodation;

class AccommodationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Copy images from dist-front to uploads
        $sourceDir = public_path('dist-front/images/');
        $targetDir = public_path('uploads/');

        if (!file_exists($targetDir)) {
            mkdir($targetDir, 0777, true);
        }

        // Copy accommodation images
        $images = ['accommodation-1.jpg', 'accommodation-2.jpg'];
        foreach ($images as $image) {
            $source = $sourceDir . $image;
            $target = $targetDir . $image;
            if (file_exists($source) && !file_exists($target)) {
                copy($source, $target);
            }
        }

        $accommodations = [
            [
                'name' => 'North Block Hotel',
                'description' => 'North Block Hotel Yountville, California, United States ratings, photos, prices, expert advice, traveler reviews and tips, and more information from Condé Nast Traveler.',
                'photo' => 'accommodation-1.jpg',
                'address' => '6757 Washington St., Yountville, California 94599, United States',
                'email' => 'contact@northblock.hotel',
                'phone' => '(707) 944-8080',
                'website' => 'https://northblock.hotel/',
            ],
            [
                'name' => 'The Pearl Hotel',
                'description' => 'Lifted straight out of our Emerald Coast beach town dreams.',
                'photo' => 'accommodation-2.jpg',
                'address' => '63 Main St., Rosemary Beach, Florida 32461, United States',
                'email' => 'contact@thepearl.hotel',
                'phone' => '(850) 588-2881',
                'website' => 'https://thepearl.hotel/',
            ],
        ];

        foreach ($accommodations as $accommodation) {
            Accommodation::create($accommodation);
        }
    }
}
