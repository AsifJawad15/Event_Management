<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SponsorCategory;

class SponsorCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Platinum Sponsor',
                'description' => 'Premium sponsorship package with maximum visibility and benefits. Includes logo placement, speaking opportunities, and exclusive networking access.'
            ],
            [
                'name' => 'Gold Sponsor',
                'description' => 'High-value sponsorship with excellent brand exposure. Includes prominent logo placement and networking opportunities.'
            ],
            [
                'name' => 'Silver Sponsor',
                'description' => 'Mid-tier sponsorship offering good brand visibility and networking benefits at the event.'
            ],
            [
                'name' => 'Bronze Sponsor',
                'description' => 'Entry-level sponsorship package with brand recognition and basic networking opportunities.'
            ],
            [
                'name' => 'Media Partner',
                'description' => 'Media partnership for promotional coverage and event publicity through various media channels.'
            ],
            [
                'name' => 'Technology Partner',
                'description' => 'Partnership focused on providing technology solutions and technical support for the event.'
            ]
        ];

        foreach ($categories as $category) {
            SponsorCategory::create($category);
        }
    }
}
