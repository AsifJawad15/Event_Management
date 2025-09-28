<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Post;

class CreateSamplePosts extends Command
{
    protected $signature = 'create:sample-posts';
    protected $description = 'Create sample posts for testing';

    public function handle()
    {
        // Clear existing posts first
        Post::truncate();

        $posts = [
            [
                'title' => 'Essential Tips for a Successful Virtual Conference',
                'slug' => 'essential-tips-for-a-successful-virtual-conference',
                'short_description' => 'Organizing a virtual conference can be challenging. Focus on engaging content, interactive sessions, & reliable technology to ensure a successful event.',
                'description' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse feugiat fringilla odio vel gravida. Phasellus nisl nisl, vestibulum at blandit quis, tincidunt sed est.</p><p>Vestibulum pretium elit erat, eget euismod odio commodo euismod. Curabitur euismod risus turpis, vitae consectetur arcu accumsan at.</p>',
                'photo' => 'post-1.jpg'
            ],
            [
                'title' => 'Maximizing Your Networking Opportunities at Events',
                'slug' => 'maximizing-your-networking-opportunities-at-events',
                'short_description' => 'Networking at events requires strategic planning. Attend relevant sessions, participate in discussions, and utilize apps to connect with professionals.',
                'description' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse feugiat fringilla odio vel gravida. Phasellus nisl nisl, vestibulum at blandit quis, tincidunt sed est.</p><p>Vestibulum pretium elit erat, eget euismod odio commodo euismod. Curabitur euismod risus turpis, vitae consectetur arcu accumsan at.</p>',
                'photo' => 'post-2.jpg'
            ],
            [
                'title' => 'How to Choose the Perfect Venue for Your Conference',
                'slug' => 'how-to-choose-the-perfect-venue-for-your-conference',
                'short_description' => 'Selecting the ideal venue involves considering location, capacity, and amenities. Ensure it aligns with your goals, and fits within your budget.',
                'description' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse feugiat fringilla odio vel gravida. Phasellus nisl nisl, vestibulum at blandit quis, tincidunt sed est.</p><p>Vestibulum pretium elit erat, eget euismod odio commodo euismod. Curabitur euismod risus turpis, vitae consectetur arcu accumsan at.</p>',
                'photo' => 'post-3.jpg'
            ]
        ];

        foreach ($posts as $postData) {
            Post::create($postData);
        }

        $this->info('Sample posts created successfully!');
        $this->info('Created ' . count($posts) . ' posts.');

        return 0;
    }
}
