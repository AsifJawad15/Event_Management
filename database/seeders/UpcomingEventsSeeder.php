<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UpcomingEvent;
use Carbon\Carbon;

class UpcomingEventsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $events = [
            [
                'title' => 'Switzerland Tech Summit 2025',
                'description' => 'Join us for an incredible tech summit in the heart of Switzerland. Experience innovation, networking, and the latest technology trends.',
                'image' => 'switzerland.jpg',
                'event_date' => Carbon::now()->addMonths(2),
                'status' => 'active',
                'order' => 1
            ],
            [
                'title' => 'Finland Innovation Conference',
                'description' => 'Discover cutting-edge innovations and connect with industry leaders at Finland\'s premier innovation conference.',
                'image' => 'finland.jpg',
                'event_date' => Carbon::now()->addMonths(3),
                'status' => 'active',
                'order' => 2
            ],
            [
                'title' => 'Iceland Digital Expo',
                'description' => 'Explore the digital landscape at Iceland\'s most anticipated technology expo featuring global speakers.',
                'image' => 'iceland.jpg',
                'event_date' => Carbon::now()->addMonths(4),
                'status' => 'active',
                'order' => 3
            ],
            [
                'title' => 'Australia Business Forum',
                'description' => 'Network with business leaders and entrepreneurs at Australia\'s largest business forum of the year.',
                'image' => 'australia.jpg',
                'event_date' => Carbon::now()->addMonths(5),
                'status' => 'active',
                'order' => 4
            ],
            [
                'title' => 'Netherlands Tech Week',
                'description' => 'A week-long celebration of technology, innovation, and entrepreneurship in the Netherlands.',
                'image' => 'netherlands.jpg',
                'event_date' => Carbon::now()->addMonths(6),
                'status' => 'active',
                'order' => 5
            ],
            [
                'title' => 'Ireland Startup Festival',
                'description' => 'Meet innovative startups and investors at Ireland\'s most exciting startup festival.',
                'image' => 'ireland.jpg',
                'event_date' => Carbon::now()->addMonths(7),
                'status' => 'active',
                'order' => 6
            ]
        ];

        foreach ($events as $event) {
            UpcomingEvent::create($event);
        }
    }
}
