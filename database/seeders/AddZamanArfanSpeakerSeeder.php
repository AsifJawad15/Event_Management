<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Speaker;
use Illuminate\Support\Str;

class AddZamanArfanSpeakerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Speaker::create([
            'name' => 'Zaman Arfan',
            'slug' => Str::slug('Zaman Arfan'),
            'email' => 'zaman.arfan@techbd.com',
            'phone' => '+880 1712-345678',
            'photo' => 'speak2.jpg',
            'designation' => 'Chief Technology Officer',
            'biography' => 'Zaman Arfan is a visionary technology leader with over 15 years of experience in software development and enterprise architecture. He has led numerous digital transformation projects across Bangladesh and Southeast Asia. His expertise spans cloud computing, artificial intelligence, and scalable system design. Zaman is passionate about mentoring young developers and promoting tech innovation in Bangladesh.',
            'address' => 'House 42, Road 12, Gulshan-2, Dhaka-1212, Bangladesh',
            'website' => 'https://zamanarfan.tech',
            'facebook' => 'https://facebook.com/zamanarfan',
            'twitter' => 'https://twitter.com/zamanarfan',
            'linkedin' => 'https://linkedin.com/in/zamanarfan',
            'instagram' => 'https://instagram.com/zamanarfan'
        ]);

        $this->command->info('Speaker Zaman Arfan has been added successfully!');
    }
}
