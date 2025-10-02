<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\HomeSpeaker;

class HomeSpeakerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        HomeSpeaker::create([
            'heading' => 'Our Speakers',
            'description' => 'Meet our distinguished speakers who will share their expertise and insights at the conference.',
            'how_many' => 4,
            'status' => 'Show'
        ]);
    }
}
