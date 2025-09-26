<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Organiser;

class OrganiserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Organiser::create([
            'name' => 'Joseph Lynch',
            'slug' => 'joseph-lynch',
            'designation' => 'Web Developer, Hugh Woods',
            'photo' => 'organiser-1.jpg',
            'email' => 'joseph.lynch@example.com',
            'phone' => '123-322-1248',
            'biography' => 'Joseph Lynch is a seasoned web developer with over a decade of experience in the tech industry. Specializing in front-end and back-end development, Joseph has honed his skills in languages such as HTML, CSS, JavaScript, and PHP, alongside a deep proficiency in frameworks like Laravel and React. His portfolio boasts a diverse array of projects, from sleek, responsive websites for small businesses to complex web applications for large corporations.',
            'address' => '43, Park Street, NYC, USA',
            'facebook' => 'https://facebook.com/josephlynch',
            'twitter' => 'https://twitter.com/josephlynch',
            'instagram' => 'https://instagram.com/josephlynch',
            'linkedin' => 'https://linkedin.com/in/josephlynch',
        ]);

        Organiser::create([
            'name' => 'John Sword',
            'slug' => 'john-sword',
            'designation' => 'Web Designer',
            'photo' => 'organiser-2.jpg',
            'email' => 'john.sword@example.com',
            'phone' => '123-456-7890',
            'biography' => 'John Sword is a creative web designer with extensive experience in creating visually stunning and user-friendly designs. He specializes in UI/UX design, branding, and digital marketing strategies that help businesses stand out in the digital landscape.',
            'address' => '123 Design Street, NYC, USA',
            'facebook' => 'https://facebook.com/johnsword',
            'twitter' => 'https://twitter.com/johnsword',
            'instagram' => 'https://instagram.com/johnsword',
            'linkedin' => 'https://linkedin.com/in/johnsword',
        ]);

        Organiser::create([
            'name' => 'Steven Gragg',
            'slug' => 'steven-gragg',
            'designation' => 'Graphic Designer',
            'photo' => 'organiser-3.jpg',
            'email' => 'steven.gragg@example.com',
            'phone' => '123-789-4561',
            'biography' => 'Steven Gragg is a talented graphic designer who brings creativity and innovation to every project. With expertise in print design, digital graphics, and brand identity, Steven has worked with numerous clients to create compelling visual communications.',
            'address' => '456 Creative Ave, NYC, USA',
            'facebook' => 'https://facebook.com/stevengragg',
            'twitter' => 'https://twitter.com/stevengragg',
            'instagram' => 'https://instagram.com/stevengragg',
            'linkedin' => 'https://linkedin.com/in/stevengragg',
        ]);

        Organiser::create([
            'name' => 'Jordan Parker',
            'slug' => 'jordan-parker',
            'designation' => 'SEO & SMM Expert',
            'photo' => 'organiser-4.jpg',
            'email' => 'jordan.parker@example.com',
            'phone' => '123-987-6543',
            'biography' => 'Jordan Parker is a digital marketing specialist with deep expertise in SEO and social media marketing. Jordan has helped countless businesses improve their online presence and achieve higher search engine rankings through strategic SEO and engaging social media campaigns.',
            'address' => '789 Marketing Blvd, NYC, USA',
            'facebook' => 'https://facebook.com/jordanparker',
            'twitter' => 'https://twitter.com/jordanparker',
            'instagram' => 'https://instagram.com/jordanparker',
            'linkedin' => 'https://linkedin.com/in/jordanparker',
        ]);
    }
}
