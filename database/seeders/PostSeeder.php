<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        $posts = [
            [
                'title' => 'Essential Tips for a Successful Virtual Conference',
                'slug' => 'essential-tips-for-a-successful-virtual-conference',
                'short_description' => 'Organizing a virtual conference can be challenging. Focus on engaging content, interactive sessions, & reliable technology to ensure a successful event.',
                'description' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse feugiat fringilla odio vel gravida. Phasellus nisl nisl, vestibulum at blandit quis, tincidunt sed est. Nulla ligula odio, imperdiet a accumsan ut, mattis nec mi. Donec hendrerit magna posuere nisl viverra rhoncus. Quisque laoreet urna nunc, a efficitur lorem auctor ac. Suspendisse vel pulvinar orci. Nunc tincidunt quam vitae orci feugiat venenatis. Morbi in ullamcorper eros. Aenean ut lorem nisi. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ultrices feugiat metus, in finibus urna. Donec vel velit pulvinar, tincidunt libero facilisis, commodo nisl.</p><p>Vestibulum pretium elit erat, eget euismod odio commodo euismod. Curabitur euismod risus turpis, vitae consectetur arcu accumsan at. Donec sit amet ligula feugiat, congue lectus ut, eleifend risus. Aenean odio purus, convallis eu ipsum sit amet, ornare condimentum mauris. Morbi a purus et nibh sollicitudin euismod. Nullam scelerisque dolor volutpat quam pharetra interdum. Suspendisse arcu odio, pretium a eros sit amet, scelerisque mollis odio. Ut vestibulum mauris a nulla dignissim fermentum. Aliquam diam massa, elementum blandit eleifend semper, ultrices vel libero. Mauris bibendum et enim in lobortis. Curabitur nec consequat purus. Donec eros turpis, pulvinar vitae luctus nec, venenatis sed felis.</p>',
                'photo' => 'post-1.jpg'
            ],
            [
                'title' => 'Maximizing Your Networking Opportunities at Events',
                'slug' => 'maximizing-your-networking-opportunities-at-events',
                'short_description' => 'Networking at events requires strategic planning. Attend relevant sessions, participate in discussions, and utilize apps to connect with professionals.',
                'description' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse feugiat fringilla odio vel gravida. Phasellus nisl nisl, vestibulum at blandit quis, tincidunt sed est. Nulla ligula odio, imperdiet a accumsan ut, mattis nec mi. Donec hendrerit magna posuere nisl viverra rhoncus. Quisque laoreet urna nunc, a efficitur lorem auctor ac. Suspendisse vel pulvinar orci. Nunc tincidunt quam vitae orci feugiat venenatis. Morbi in ullamcorper eros. Aenean ut lorem nisi. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ultrices feugiat metus, in finibus urna. Donec vel velit pulvinar, tincidunt libero facilisis, commodo nisl.</p><p>Vestibulum pretium elit erat, eget euismod odio commodo euismod. Curabitur euismod risus turpis, vitae consectetur arcu accumsan at. Donec sit amet ligula feugiat, congue lectus ut, eleifend risus. Aenean odio purus, convallis eu ipsum sit amet, ornare condimentum mauris. Morbi a purus et nibh sollicitudin euismod. Nullam scelerisque dolor volutpat quam pharetra interdum. Suspendisse arcu odio, pretium a eros sit amet, scelerisque mollis odio. Ut vestibulum mauris a nulla dignissim fermentum. Aliquam diam massa, elementum blandit eleifend semper, ultrices vel libero. Mauris bibendum et enim in lobortis. Curabitur nec consequat purus. Donec eros turpis, pulvinar vitae luctus nec, venenatis sed felis.</p>',
                'photo' => 'post-2.jpg'
            ],
            [
                'title' => 'How to Choose the Perfect Venue for Your Conference',
                'slug' => 'how-to-choose-the-perfect-venue-for-your-conference',
                'short_description' => 'Selecting the ideal venue involves considering location, capacity, and amenities. Ensure it aligns with your goals, and fits within your budget.',
                'description' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse feugiat fringilla odio vel gravida. Phasellus nisl nisl, vestibulum at blandit quis, tincidunt sed est. Nulla ligula odio, imperdiet a accumsan ut, mattis nec mi. Donec hendrerit magna posuere nisl viverra rhoncus. Quisque laoreet urna nunc, a efficitur lorem auctor ac. Suspendisse vel pulvinar orci. Nunc tincidunt quam vitae orci feugiat venenatis. Morbi in ullamcorper eros. Aenean ut lorem nisi. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ultrices feugiat metus, in finibus urna. Donec vel velit pulvinar, tincidunt libero facilisis, commodo nisl.</p><p>Vestibulum pretium elit erat, eget euismod odio commodo euismod. Curabitur euismod risus turpis, vitae consectetur arcu accumsan at. Donec sit amet ligula feugiat, congue lectus ut, eleifend risus. Aenean odio purus, convallis eu ipsum sit amet, ornare condimentum mauris. Morbi a purus et nibh sollicitudin euismod. Nullam scelerisque dolor volutpat quam pharetra interdum. Suspendisse arcu odio, pretium a eros sit amet, scelerisque mollis odio. Ut vestibulum mauris a nulla dignissim fermentum. Aliquam diam massa, elementum blandit eleifend semper, ultrices vel libero. Mauris bibendum et enim in lobortis. Curabitur nec consequat purus. Donec eros turpis, pulvinar vitae luctus nec, venenatis sed felis.</p>',
                'photo' => 'post-3.jpg'
            ],
            [
                'title' => 'The Future of Hybrid Events: Combining Digital and Physical',
                'slug' => 'the-future-of-hybrid-events-combining-digital-and-physical',
                'short_description' => 'Hybrid events offer the best of both worlds. Learn how to seamlessly integrate virtual and in-person experiences for maximum engagement.',
                'description' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse feugiat fringilla odio vel gravida. Phasellus nisl nisl, vestibulum at blandit quis, tincidunt sed est. Nulla ligula odio, imperdiet a accumsan ut, mattis nec mi. Donec hendrerit magna posuere nisl viverra rhoncus. Quisque laoreet urna nunc, a efficitur lorem auctor ac. Suspendisse vel pulvinar orci. Nunc tincidunt quam vitae orci feugiat venenatis. Morbi in ullamcorper eros. Aenean ut lorem nisi. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ultrices feugiat metus, in finibus urna. Donec vel velit pulvinar, tincidunt libero facilisis, commodo nisl.</p><p>Vestibulum pretium elit erat, eget euismod odio commodo euismod. Curabitur euismod risus turpis, vitae consectetur arcu accumsan at. Donec sit amet ligula feugiat, congue lectus ut, eleifend risus. Aenean odio purus, convallis eu ipsum sit amet, ornare condimentum mauris. Morbi a purus et nibh sollicitudin euismod. Nullam scelerisque dolor volutpat quam pharetra interdum. Suspendisse arcu odio, pretium a eros sit amet, scelerisque mollis odio. Ut vestibulum mauris a nulla dignissim fermentum. Aliquam diam massa, elementum blandit eleifend semper, ultrices vel libero. Mauris bibendum et enim in lobortis. Curabitur nec consequat purus. Donec eros turpis, pulvinar vitae luctus nec, venenatis sed felis.</p>',
                'photo' => 'post-1.jpg'
            ],
            [
                'title' => 'Event Marketing Strategies That Actually Work',
                'slug' => 'event-marketing-strategies-that-actually-work',
                'short_description' => 'Effective event marketing goes beyond social media posts. Discover proven strategies to increase attendance and engagement.',
                'description' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse feugiat fringilla odio vel gravida. Phasellus nisl nisl, vestibulum at blandit quis, tincidunt sed est. Nulla ligula odio, imperdiet a accumsan ut, mattis nec mi. Donec hendrerit magna posuere nisl viverra rhoncus. Quisque laoreet urna nunc, a efficitur lorem auctor ac. Suspendisse vel pulvinar orci. Nunc tincidunt quam vitae orci feugiat venenatis. Morbi in ullamcorper eros. Aenean ut lorem nisi. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ultrices feugiat metus, in finibus urna. Donec vel velit pulvinar, tincidunt libero facilisis, commodo nisl.</p><p>Vestibulum pretium elit erat, eget euismod odio commodo euismod. Curabitur euismod risus turpis, vitae consectetur arcu accumsan at. Donec sit amet ligula feugiat, congue lectus ut, eleifend risus. Aenean odio purus, convallis eu ipsum sit amet, ornare condimentum mauris. Morbi a purus et nibh sollicitudin euismod. Nullam scelerisque dolor volutpat quam pharetra interdum. Suspendisse arcu odio, pretium a eros sit amet, scelerisque mollis odio. Ut vestibulum mauris a nulla dignissim fermentum. Aliquam diam massa, elementum blandit eleifend semper, ultrices vel libero. Mauris bibendum et enim in lobortis. Curabitur nec consequat purus. Donec eros turpis, pulvinar vitae luctus nec, venenatis sed felis.</p>',
                'photo' => 'post-2.jpg'
            ],
            [
                'title' => 'Creating Memorable Event Experiences',
                'slug' => 'creating-memorable-event-experiences',
                'short_description' => 'Great events leave lasting impressions. Learn how to design experiences that attendees will remember and talk about long after the event ends.',
                'description' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse feugiat fringilla odio vel gravida. Phasellus nisl nisl, vestibulum at blandit quis, tincidunt sed est. Nulla ligula odio, imperdiet a accumsan ut, mattis nec mi. Donec hendrerit magna posuere nisl viverra rhoncus. Quisque laoreet urna nunc, a efficitur lorem auctor ac. Suspendisse vel pulvinar orci. Nunc tincidunt quam vitae orci feugiat venenatis. Morbi in ullamcorper eros. Aenean ut lorem nisi. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ultrices feugiat metus, in finibus urna. Donec vel velit pulvinar, tincidunt libero facilisis, commodo nisl.</p><p>Vestibulum pretium elit erat, eget euismod odio commodo euismod. Curabitur euismod risus turpis, vitae consectetur arcu accumsan at. Donec sit amet ligula feugiat, congue lectus ut, eleifend risus. Aenean odio purus, convallis eu ipsum sit amet, ornare condimentum mauris. Morbi a purus et nibh sollicitudin euismod. Nullam scelerisque dolor volutpat quam pharetra interdum. Suspendisse arcu odio, pretium a eros sit amet, scelerisque mollis odio. Ut vestibulum mauris a nulla dignissim fermentum. Aliquam diam massa, elementum blandit eleifend semper, ultrices vel libero. Mauris bibendum et enim in lobortis. Curabitur nec consequat purus. Donec eros turpis, pulvinar vitae luctus nec, venenatis sed felis.</p>',
                'photo' => 'post-3.jpg'
            ]
        ];

        foreach ($posts as $post) {
            Post::create($post);
        }
    }
}
