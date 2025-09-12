<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Speaker;

class SpeakerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $speakers = [
            [
                'name' => 'Danny Allen',
                'email' => 'danny.allen@aacompany.com',
                'phone' => '+1-555-0101',
                'photo' => 'speaker-1.jpg',
                'designation' => 'Founder & CEO',
                'biography' => 'Danny Allen is a visionary entrepreneur and the founder of AA Company, a leading technology firm specializing in artificial intelligence and machine learning solutions. With over 15 years of experience in the tech industry, Danny has been instrumental in developing cutting-edge AI applications that have revolutionized various sectors including healthcare, finance, and autonomous systems. He holds a Ph.D. in Computer Science from Stanford University and has published numerous research papers in top-tier journals. Danny is passionate about mentoring young entrepreneurs and frequently speaks at international conferences about the future of AI and its ethical implications.',
                'address' => '123 Tech Valley, Silicon Valley, CA 94041, USA',
                'website' => 'https://www.aacompany.com',
                'facebook' => 'https://facebook.com/dannyallen.official',
                'twitter' => 'https://twitter.com/danny_allen_ai',
                'linkedin' => 'https://linkedin.com/in/dannyallen',
                'instagram' => 'https://instagram.com/danny.allen.tech'
            ],
            [
                'name' => 'John Sword',
                'email' => 'john.sword@bbcompany.com',
                'phone' => '+1-555-0202',
                'photo' => 'speaker-2.jpg',
                'designation' => 'Founder & CTO',
                'biography' => 'John Sword is the innovative founder and Chief Technology Officer of BB Company, a pioneering cybersecurity firm that protects millions of users worldwide. With a background in ethical hacking and network security, John has spent over 12 years identifying and mitigating cyber threats for Fortune 500 companies. He is a certified ethical hacker (CEH) and holds multiple cybersecurity certifications. John\'s expertise spans from penetration testing to developing advanced threat detection algorithms. He regularly contributes to open-source security projects and has been featured in major tech publications for his groundbreaking work in quantum-resistant cryptography.',
                'address' => '456 Security Boulevard, Austin, TX 73301, USA',
                'website' => 'https://www.bbcompany.com',
                'facebook' => 'https://facebook.com/johnsword.security',
                'twitter' => 'https://twitter.com/john_sword_sec',
                'linkedin' => 'https://linkedin.com/in/johnsword',
                'instagram' => null
            ],
            [
                'name' => 'Steven Gragg',
                'email' => 'steven.gragg@cccompany.com',
                'phone' => '+1-555-0303',
                'photo' => 'speaker-3.jpg',
                'designation' => 'Founder & Chief Innovation Officer',
                'biography' => 'Steven Gragg is the dynamic founder and Chief Innovation Officer of CC Company, a renewable energy startup that has made significant strides in solar panel efficiency and energy storage solutions. With a Master\'s degree in Environmental Engineering from MIT, Steven has dedicated his career to developing sustainable technologies that combat climate change. Under his leadership, CC Company has developed revolutionary solar cells that are 40% more efficient than traditional panels. Steven is also an advocate for green technology policies and has advised government agencies on renewable energy initiatives. He believes in the power of technology to create a sustainable future for generations to come.',
                'address' => '789 Green Energy Lane, Portland, OR 97201, USA',
                'website' => 'https://www.cccompany.com',
                'facebook' => 'https://facebook.com/stevengragg.green',
                'twitter' => 'https://twitter.com/steven_gragg',
                'linkedin' => 'https://linkedin.com/in/stevengragg',
                'instagram' => 'https://instagram.com/steven.gragg.eco'
            ],
            [
                'name' => 'Jordan Parker',
                'email' => 'jordan.parker@ddcompany.com',
                'phone' => '+1-555-0404',
                'photo' => 'speaker-4.jpg',
                'designation' => 'Founder & CEO',
                'biography' => 'Jordan Parker is the charismatic founder and CEO of DD Company, a revolutionary fintech startup that has transformed digital banking and cryptocurrency trading platforms. With an MBA from Harvard Business School and a background in investment banking, Jordan has successfully raised over $100 million in venture capital funding. DD Company\'s platform has over 2 million active users and processes billions of dollars in transactions annually. Jordan is known for their innovative approach to financial inclusion and has been recognized as one of the "Top 40 Under 40" leaders in fintech. They are passionate about democratizing access to financial services and frequently speaks about the future of digital currencies and decentralized finance.',
                'address' => '321 Financial District, New York, NY 10004, USA',
                'website' => 'https://www.ddcompany.com',
                'facebook' => 'https://facebook.com/jordanparker.fintech',
                'twitter' => 'https://twitter.com/jordan_parker_dd',
                'linkedin' => 'https://linkedin.com/in/jordanparker',
                'instagram' => 'https://instagram.com/jordan.parker.ceo'
            ]
        ];

        foreach ($speakers as $speaker) {
            Speaker::create($speaker);
        }
    }
}
