<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TermPageItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\TermPageItem::create([
            'content' => '<h3>Terms and Conditions</h3>
<p>Welcome to SingleEvent. These terms and conditions outline the rules and regulations for the use of SingleEvent\'s Website.</p>

<h4>1. Introduction</h4>
<p>By accessing this website we assume you accept these terms and conditions. Do not continue to use SingleEvent if you do not agree to take all of the terms and conditions stated on this page.</p>

<h4>2. License</h4>
<p>Unless otherwise stated, SingleEvent and/or its licensors own the intellectual property rights for all material on SingleEvent. All intellectual property rights are reserved. You may access this from SingleEvent for your own personal use subjected to restrictions set in these terms and conditions.</p>

<h4>3. User Comments</h4>
<p>Parts of this website offer an opportunity for users to post and exchange opinions and information in certain areas of the website. SingleEvent does not filter, edit, publish or review Comments prior to their presence on the website.</p>

<h4>4. Reservation of Rights</h4>
<p>We reserve the right to request that you remove all links or any particular link to our Website. You approve to immediately remove all links to our Website upon request.</p>

<h4>5. Disclaimer</h4>
<p>To the maximum extent permitted by applicable law, we exclude all representations, warranties and conditions relating to our website and the use of this website.</p>'
        ]);
    }
}
