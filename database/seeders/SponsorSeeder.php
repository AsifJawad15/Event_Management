<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Sponsor;
use App\Models\SponsorCategory;
use Illuminate\Support\Str;

class SponsorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get sponsor categories
        $platinumCategory = SponsorCategory::where('name', 'Platinum Sponsor')->first();
        $goldCategory = SponsorCategory::where('name', 'Gold Sponsor')->first();
        $silverCategory = SponsorCategory::where('name', 'Silver Sponsor')->first();

        // Create example sponsors
        $sponsors = [
            [
                'sponsor_category_id' => $platinumCategory->id,
                'name' => 'Microsoft Corporation',
                'slug' => Str::slug('Microsoft Corporation'),
                'tagline' => 'Empowering every person and organization on the planet to achieve more',
                'description' => 'Microsoft Corporation is an American multinational technology corporation that produces computer software, consumer electronics, personal computers, and related services.',
                'address' => 'One Microsoft Way, Redmond, WA 98052, USA',
                'email' => 'info@microsoft.com',
                'phone' => '+1-425-882-8080',
                'website' => 'https://www.microsoft.com',
                'facebook' => 'https://www.facebook.com/Microsoft',
                'twitter' => 'https://twitter.com/Microsoft',
                'linkedin' => 'https://www.linkedin.com/company/microsoft',
                'instagram' => 'https://www.instagram.com/microsoft',
                'map' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2689.2667863123726!2d-122.13906268436596!3d47.64398817918693!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54906d7b36d69f91%3A0x3c2f08bfb6e5b8a9!2sMicrosoft%20Corporation!5e0!3m2!1sen!2sus!4v1632345678901!5m2!1sen!2sus" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>'
            ],
            [
                'sponsor_category_id' => $goldCategory->id,
                'name' => 'Google LLC',
                'slug' => Str::slug('Google LLC'),
                'tagline' => 'Organizing the world\'s information and making it universally accessible',
                'description' => 'Google LLC is an American multinational technology company that specializes in Internet-related services and products.',
                'address' => '1600 Amphitheatre Parkway, Mountain View, CA 94043, USA',
                'email' => 'contact@google.com',
                'phone' => '+1-650-253-0000',
                'website' => 'https://www.google.com',
                'facebook' => 'https://www.facebook.com/Google',
                'twitter' => 'https://twitter.com/Google',
                'linkedin' => 'https://www.linkedin.com/company/google',
                'instagram' => 'https://www.instagram.com/google'
            ],
            [
                'sponsor_category_id' => $silverCategory->id,
                'name' => 'Amazon Web Services',
                'slug' => Str::slug('Amazon Web Services'),
                'tagline' => 'The world\'s most comprehensive and broadly adopted cloud platform',
                'description' => 'Amazon Web Services (AWS) is a subsidiary of Amazon providing on-demand cloud computing platforms.',
                'address' => '410 Terry Avenue North, Seattle, WA 98109, USA',
                'email' => 'aws-info@amazon.com',
                'phone' => '+1-206-266-1000',
                'website' => 'https://aws.amazon.com',
                'facebook' => 'https://www.facebook.com/AmazonWebServices',
                'twitter' => 'https://twitter.com/awscloud',
                'linkedin' => 'https://www.linkedin.com/company/amazon-web-services'
            ]
        ];

        foreach ($sponsors as $sponsorData) {
            Sponsor::create($sponsorData);
        }
    }
}
