<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ScheduleDay;
use App\Models\Schedule;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create Schedule Days
        $day1 = ScheduleDay::create([
            'day' => 'Day 1',
            'date1' => '2025-09-20',
            'order1' => 1
        ]);

        $day2 = ScheduleDay::create([
            'day' => 'Day 2',
            'date1' => '2025-09-21',
            'order1' => 2
        ]);

        $day3 = ScheduleDay::create([
            'day' => 'Day 3',
            'date1' => '2025-09-22',
            'order1' => 3
        ]);

        // Create Schedules for Day 1
        Schedule::create([
            'schedule_day_id' => $day1->id,
            'title' => 'Introduction to PHP and Laravel',
            'description' => 'Join our experts as they guide you through the fundamentals of PHP and how it integrates with Laravel to build robust web applications. Perfect for beginners and those looking to enhance their web development skills.',
            'location' => 'Tim Center (3rd Floor), 34, Park Street, NYC, USA',
            'time' => '09:00 AM - 09:45 AM',
            'photo' => 'day1_session1.jpg',
            'item_order1' => 1
        ]);

        Schedule::create([
            'schedule_day_id' => $day1->id,
            'title' => 'Advanced SEO Technique',
            'description' => 'Discover advanced SEO strategies with our expert to improve your website\'s visibility and ranking on search engines. This session is ideal for professionals looking to stay ahead in the competitive digital landscape.',
            'location' => 'Tim Center (3rd Floor), 34, Park Street, NYC, USA',
            'time' => '10:00 AM - 10:30 AM',
            'photo' => 'day1_session2.jpg',
            'item_order1' => 2
        ]);

        // Create Schedules for Day 2
        Schedule::create([
            'schedule_day_id' => $day2->id,
            'title' => 'Introduction to Artificial Intelligence',
            'description' => 'Dive into the world of AI with our leading researcher. This session will cover the basics of artificial intelligence, its applications, and the future potential of AI technologies.',
            'location' => 'Rokman Hall (5th Floor), 76 Park Street, NYC, USA',
            'time' => '10:00 AM - 10:45 AM',
            'photo' => 'day2_session1.jpg',
            'item_order1' => 1
        ]);

        Schedule::create([
            'schedule_day_id' => $day2->id,
            'title' => 'Machine Learning for Beginners',
            'description' => 'Join our machine learning expert as they simplify the concepts of machine learning. This session is perfect for those new to the field, providing an overview of algorithms, models, and real-world applications.',
            'location' => 'Rokman Hall (5th Floor), 76 Park Street, NYC, USA',
            'time' => '11:00 AM - 11:30 AM',
            'photo' => 'day2_session2.jpg',
            'item_order1' => 2
        ]);

        // Create Schedules for Day 3
        Schedule::create([
            'schedule_day_id' => $day3->id,
            'title' => 'Future of Web Development',
            'description' => 'Explore the future trends in web development with industry experts. Learn about emerging technologies, frameworks, and best practices that will shape the future of web development.',
            'location' => 'Main Auditorium, 45 Tech Street, NYC, USA',
            'time' => '09:00 AM - 10:00 AM',
            'photo' => 'day3_session1.jpg',
            'item_order1' => 1
        ]);

        Schedule::create([
            'schedule_day_id' => $day3->id,
            'title' => 'Closing Ceremony',
            'description' => 'Join us for the closing ceremony where we will summarize the key takeaways from the event and celebrate the achievements of all participants.',
            'location' => 'Main Auditorium, 45 Tech Street, NYC, USA',
            'time' => '04:00 PM - 05:00 PM',
            'photo' => 'day3_session2.jpg',
            'item_order1' => 2
        ]);
    }
}
