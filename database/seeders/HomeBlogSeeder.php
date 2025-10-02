<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\HomeBlog;

class HomeBlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        HomeBlog::create([
            'heading' => 'Latest News & Blog',
            'description' => 'Stay updated with our latest news, articles, and announcements.',
            'how_many' => 3,
            'status' => 'Show'
        ]);
    }
}
