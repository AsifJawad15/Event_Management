<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Testimonial;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $testimonials = [
            [
                'name' => 'John Doe',
                'designation' => 'CEO of Tech Innovators Inc.',
                'photo' => 'testimonial-1.jpg',
                'comment' => 'Attending the Annual Innovation Summit was a game-changer for our company. The networking opportunities were unparalleled, and the insights we gained from the keynote speakers were invaluable. We left inspired and equipped with actionable strategies to drive our business forward. Can\'t wait for next year\'s event!'
            ],
            [
                'name' => 'Jane Smith',
                'designation' => 'Marketing Director at Creative Solutions',
                'photo' => 'testimonial-2.jpg',
                'comment' => 'The Digital Marketing Conference exceeded all my expectations. From the engaging workshops to the panel discussions featuring industry leaders, every aspect was meticulously organized. The event provided a perfect blend of learning and networking. I\'ve already implemented several ideas I picked up, and the results are impressive.'
            ],
            [
                'name' => 'Michael Brown',
                'designation' => 'Freelance Graphic Designer',
                'photo' => 'testimonial-3.jpg',
                'comment' => 'As a freelance professional, the Design Expo was an incredible opportunity to connect with peers and potential clients. The variety of sessions, from hands-on workshops to trend analysis, was fantastic. The inspiration and knowledge I gained have significantly impacted my work. This event is a must-attend for anyone in the creative industry.'
            ],
            [
                'name' => 'Sarah Johnson',
                'designation' => 'Senior Software Developer',
                'photo' => 'testimonial-4.jpg',
                'comment' => 'The Tech Conference was absolutely phenomenal! The speakers were industry experts who shared cutting-edge insights. The hands-on workshops were particularly valuable, allowing us to implement what we learned immediately. The organization was flawless, and the networking opportunities were exceptional.'
            ],
            [
                'name' => 'David Wilson',
                'designation' => 'Business Development Manager',
                'photo' => 'testimonial-5.jpg',
                'comment' => 'This conference has become an annual must-attend event for our team. The quality of content, the caliber of speakers, and the networking opportunities are unmatched. Every year, we return to the office with fresh ideas and valuable connections that directly contribute to our business growth.'
            ]
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::create($testimonial);
        }
    }
}
