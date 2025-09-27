<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Photo;

class PhotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $photos = [
            [
                'caption' => 'Event Opening Ceremony',
                'photo' => 'gallery-1.jpg'
            ],
            [
                'caption' => 'Keynote Speaker Session',
                'photo' => 'gallery-2.jpg'
            ],
            [
                'caption' => 'Networking Break',
                'photo' => 'gallery-3.jpg'
            ],
            [
                'caption' => 'Panel Discussion',
                'photo' => 'gallery-4.jpg'
            ],
            [
                'caption' => 'Workshop Session',
                'photo' => 'gallery-5.jpg'
            ],
            [
                'caption' => 'Award Ceremony',
                'photo' => 'gallery-6.jpg'
            ]
        ];

        foreach ($photos as $photo) {
            Photo::create($photo);
        }
    }
}
