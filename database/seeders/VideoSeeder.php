<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Video;

class VideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $videos = [
            [
                'caption' => 'Event Highlights - Day 1',
                'video' => 'AQleI8oFqZo'
            ],
            [
                'caption' => 'Keynote Speaker Presentation',
                'video' => 'rD3e6avEOKc'
            ],
            [
                'caption' => 'Workshop Session - Tech Innovation',
                'video' => 'wAENwCURMmQ'
            ],
            [
                'caption' => 'Panel Discussion - Future of Events',
                'video' => 'N8tnM9KyLos'
            ],
            [
                'caption' => 'Networking Session Highlights',
                'video' => 'aScfZll2CQ4'
            ],
            [
                'caption' => 'Event Closing Ceremony',
                'video' => 'y84gv0oacGA'
            ],
        ];

        foreach ($videos as $video) {
            Video::create($video);
        }
    }
}
