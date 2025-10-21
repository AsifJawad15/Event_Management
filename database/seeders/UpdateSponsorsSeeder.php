<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Sponsor;
use App\Models\SponsorCategory;
use Illuminate\Support\Str;

class UpdateSponsorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Delete all existing sponsors
        Sponsor::truncate();

        // Get the first 3 sponsor categories (Platinum, Gold, Silver)
        $categories = SponsorCategory::orderBy('id')->take(3)->get();

        if ($categories->count() < 3) {
            $this->command->error('Not enough sponsor categories. Please ensure at least 3 categories exist.');
            return;
        }

        $sponsors = [
            // Platinum Sponsors (3 sponsors)
            [
                'sponsor_category_id' => $categories[0]->id,
                'name' => 'BBC',
                'slug' => Str::slug('BBC'),
                'tagline' => 'British Broadcasting Corporation',
                'description' => 'The world\'s leading public service broadcaster, providing trusted news and entertainment.',
                'logo' => 'bbc.webp',
                'featured_photo' => 'bbc.webp',
                'address' => 'Broadcasting House, Portland Place, London W1A 1AA, UK',
                'email' => 'contact@bbc.com',
                'phone' => '+44 20 7580 4468',
                'website' => 'https://www.bbc.com',
                'facebook' => 'https://facebook.com/bbc',
                'twitter' => 'https://twitter.com/bbc',
                'linkedin' => 'https://linkedin.com/company/bbc',
                'instagram' => 'https://instagram.com/bbc',
            ],
            [
                'sponsor_category_id' => $categories[0]->id,
                'name' => 'CNN',
                'slug' => Str::slug('CNN'),
                'tagline' => 'Cable News Network',
                'description' => 'A leading global news network providing breaking news, analysis, and investigative journalism.',
                'logo' => 'cnn.webp',
                'featured_photo' => 'cnn.webp',
                'address' => 'One CNN Center, Atlanta, GA 30303, USA',
                'email' => 'info@cnn.com',
                'phone' => '+1 404 827 1500',
                'website' => 'https://www.cnn.com',
                'facebook' => 'https://facebook.com/cnn',
                'twitter' => 'https://twitter.com/cnn',
                'linkedin' => 'https://linkedin.com/company/cnn',
                'instagram' => 'https://instagram.com/cnn',
            ],
            [
                'sponsor_category_id' => $categories[0]->id,
                'name' => 'OpenAI',
                'slug' => Str::slug('OpenAI'),
                'tagline' => 'Pioneering Artificial Intelligence',
                'description' => 'Leading AI research and deployment company, creator of ChatGPT and advanced AI systems.',
                'logo' => 'openai.webp',
                'featured_photo' => 'openai.webp',
                'address' => '3180 18th St, San Francisco, CA 94110, USA',
                'email' => 'support@openai.com',
                'phone' => '+1 415 941 9902',
                'website' => 'https://www.openai.com',
                'facebook' => 'https://facebook.com/openai',
                'twitter' => 'https://twitter.com/openai',
                'linkedin' => 'https://linkedin.com/company/openai',
                'instagram' => 'https://instagram.com/openai',
            ],

            // Gold Sponsors (3 sponsors)
            [
                'sponsor_category_id' => $categories[1]->id,
                'name' => 'Google Gemini',
                'slug' => Str::slug('Google Gemini'),
                'tagline' => 'Next Generation AI',
                'description' => 'Google\'s most capable AI model, advancing multimodal understanding and generation.',
                'logo' => 'gemini.webp',
                'featured_photo' => 'gemini.webp',
                'address' => '1600 Amphitheatre Parkway, Mountain View, CA 94043, USA',
                'email' => 'gemini@google.com',
                'phone' => '+1 650 253 0000',
                'website' => 'https://gemini.google.com',
                'facebook' => 'https://facebook.com/google',
                'twitter' => 'https://twitter.com/google',
                'linkedin' => 'https://linkedin.com/company/google',
                'instagram' => 'https://instagram.com/google',
            ],
            [
                'sponsor_category_id' => $categories[1]->id,
                'name' => 'Perplexity AI',
                'slug' => Str::slug('Perplexity AI'),
                'tagline' => 'AI-Powered Answer Engine',
                'description' => 'Revolutionary AI search engine providing accurate, real-time information with citations.',
                'logo' => 'perplexity.webp',
                'featured_photo' => 'perplexity.webp',
                'address' => 'San Francisco, CA, USA',
                'email' => 'hello@perplexity.ai',
                'phone' => '+1 415 800 5500',
                'website' => 'https://www.perplexity.ai',
                'facebook' => 'https://facebook.com/perplexityai',
                'twitter' => 'https://twitter.com/perplexity_ai',
                'linkedin' => 'https://linkedin.com/company/perplexityai',
                'instagram' => 'https://instagram.com/perplexity_ai',
            ],
            [
                'sponsor_category_id' => $categories[1]->id,
                'name' => 'Microsoft',
                'slug' => Str::slug('Microsoft'),
                'tagline' => 'Empowering Innovation',
                'description' => 'Global technology leader providing software, services, devices, and solutions.',
                'logo' => 'microsoft.webp',
                'featured_photo' => 'microsoft.webp',
                'address' => 'One Microsoft Way, Redmond, WA 98052, USA',
                'email' => 'info@microsoft.com',
                'phone' => '+1 425 882 8080',
                'website' => 'https://www.microsoft.com',
                'facebook' => 'https://facebook.com/microsoft',
                'twitter' => 'https://twitter.com/microsoft',
                'linkedin' => 'https://linkedin.com/company/microsoft',
                'instagram' => 'https://instagram.com/microsoft',
            ],

            // Silver Sponsors (3 sponsors)
            [
                'sponsor_category_id' => $categories[2]->id,
                'name' => 'NVIDIA',
                'slug' => Str::slug('NVIDIA'),
                'tagline' => 'The AI Computing Company',
                'description' => 'Leading GPU and AI computing technology company powering innovation in gaming, data centers, and AI.',
                'logo' => 'nvidia.webp',
                'featured_photo' => 'nvidia.webp',
                'address' => '2788 San Tomas Expressway, Santa Clara, CA 95051, USA',
                'email' => 'info@nvidia.com',
                'phone' => '+1 408 486 2000',
                'website' => 'https://www.nvidia.com',
                'facebook' => 'https://facebook.com/nvidia',
                'twitter' => 'https://twitter.com/nvidia',
                'linkedin' => 'https://linkedin.com/company/nvidia',
                'instagram' => 'https://instagram.com/nvidia',
            ],
            [
                'sponsor_category_id' => $categories[2]->id,
                'name' => 'Netflix',
                'slug' => Str::slug('Netflix'),
                'tagline' => 'Entertainment Streaming Leader',
                'description' => 'World\'s leading streaming entertainment service with original content and global reach.',
                'logo' => 'netflix.webp',
                'featured_photo' => 'netflix.webp',
                'address' => '100 Winchester Circle, Los Gatos, CA 95032, USA',
                'email' => 'info@netflix.com',
                'phone' => '+1 408 540 3700',
                'website' => 'https://www.netflix.com',
                'facebook' => 'https://facebook.com/netflix',
                'twitter' => 'https://twitter.com/netflix',
                'linkedin' => 'https://linkedin.com/company/netflix',
                'instagram' => 'https://instagram.com/netflix',
            ],
            [
                'sponsor_category_id' => $categories[2]->id,
                'name' => 'Amazon Web Services',
                'slug' => Str::slug('Amazon Web Services'),
                'tagline' => 'Cloud Computing Services',
                'description' => 'World\'s most comprehensive and broadly adopted cloud platform, offering over 200 services.',
                'logo' => 'aws.webp',
                'featured_photo' => 'aws.webp',
                'address' => '410 Terry Avenue North, Seattle, WA 98109, USA',
                'email' => 'aws-sales@amazon.com',
                'phone' => '+1 206 266 4064',
                'website' => 'https://aws.amazon.com',
                'facebook' => 'https://facebook.com/amazonwebservices',
                'twitter' => 'https://twitter.com/awscloud',
                'linkedin' => 'https://linkedin.com/company/amazon-web-services',
                'instagram' => 'https://instagram.com/awscloud',
            ],
        ];

        foreach ($sponsors as $sponsor) {
            Sponsor::create($sponsor);
        }

        $this->command->info('Successfully created 9 new sponsors across 3 categories!');
    }
}
