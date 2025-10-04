<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::create([
            'logo' => 'logo.png',
            'favicon' => 'favicon.png',
            'banner' => 'banner.jpg',
            'ticket_purchase_expire_date' => '2025-12-31',
            'theme_color' => '#e74c3c',
            'copyright' => '© 2025 Event Management. All Rights Reserved.',
            'footer_address' => '123 Event Street, City, Country',
            'footer_email' => 'info@eventmanagement.com',
            'footer_phone' => '+1234567890',
            'footer_facebook' => 'https://facebook.com/eventmanagement',
            'footer_twitter' => 'https://twitter.com/eventmanagement',
            'footer_linkedin' => 'https://linkedin.com/company/eventmanagement',
            'footer_instagram' => 'https://instagram.com/eventmanagement',
        ]);
    }
}
