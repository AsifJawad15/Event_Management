<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\UpcomingEvent;
use Illuminate\Support\Facades\File;

class UpcomingEventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // First, copy images from 'upcoming events' folder to 'uploads' folder
        $sourceDir = public_path('upcoming events');
        $destDir = public_path('uploads');

        // Create uploads directory if it doesn't exist
        if (!File::exists($destDir)) {
            File::makeDirectory($destDir, 0755, true);
        }

        // Define sample events data
        $events = [
            [
                'title' => 'Annual Tech Conference 2025',
                'description' => 'Join us for the biggest tech conference of the year! Featuring keynote speakers from leading tech companies, hands-on workshops, and networking opportunities with industry professionals.',
                'image' => 'conference.jpg',
                'event_date' => '2025-11-15',
                'status' => 'active',
                'order' => 1
            ],
            [
                'title' => 'Grand Wedding Celebration',
                'description' => 'A beautiful celebration of love and unity. Experience an elegant wedding ceremony with stunning decorations, delicious cuisine, and unforgettable moments.',
                'image' => 'wedding.jpg',
                'event_date' => '2025-12-20',
                'status' => 'active',
                'order' => 2
            ],
            [
                'title' => 'Company Anniversary Gala',
                'description' => 'Celebrating 25 years of excellence! Join us for an evening of entertainment, awards, recognition, and celebration of our journey together.',
                'image' => 'anniversary.jpg',
                'event_date' => '2025-10-30',
                'status' => 'active',
                'order' => 3
            ],
            [
                'title' => 'Birthday Bash Extravaganza',
                'description' => 'An unforgettable birthday celebration filled with music, dance, games, and entertainment for all ages. Join us for cake, fun, and memories!',
                'image' => 'birthday.jpg',
                'event_date' => '2025-11-05',
                'status' => 'active',
                'order' => 4
            ],
            [
                'title' => 'New Year Celebration 2026',
                'description' => 'Ring in the new year with style! Enjoy live music, dance performances, midnight countdown, fireworks, and a spectacular celebration.',
                'image' => 'celebration.jpg',
                'event_date' => '2025-12-31',
                'status' => 'active',
                'order' => 5
            ],
            [
                'title' => 'Main Event - Grand Launch',
                'description' => 'Our flagship event of the year! A spectacular showcase featuring world-class performers, exclusive previews, and once-in-a-lifetime experiences. This is the event you\'ve been waiting for!',
                'image' => 'main_event.jpg',
                'event_date' => '2026-01-15',
                'status' => 'active',
                'order' => 0
            ],
            [
                'title' => 'Mystery Event - Coming Soon',
                'description' => 'Something incredible is on the horizon! Stay tuned for an exciting announcement about our upcoming mystery event that will blow your mind.',
                'image' => 'comming soon...jpg',
                'event_date' => '2026-02-14',
                'status' => 'active',
                'order' => 6
            ]
        ];

        // Copy images and create events
        foreach ($events as $eventData) {
            $sourceFile = $sourceDir . '/' . $eventData['image'];
            $destFile = $destDir . '/' . $eventData['image'];

            // Copy image if it exists and not already in uploads
            if (File::exists($sourceFile) && !File::exists($destFile)) {
                File::copy($sourceFile, $destFile);
            }

            // Create event
            UpcomingEvent::create($eventData);
        }

        $this->command->info('Upcoming events seeded successfully!');
        $this->command->info('Images copied from "upcoming events" folder to "uploads" folder.');
    }
}
