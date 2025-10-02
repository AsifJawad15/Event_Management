<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PrivacyPageItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\PrivacyPageItem::create([
            'content' => '<h3>Privacy Policy</h3>
<p>Your privacy is important to us. It is SingleEvent\'s policy to respect your privacy regarding any information we may collect from you across our website.</p>

<h4>1. Information We Collect</h4>
<p>We only collect information about you if we have a reason to do so – for example, to provide our services, to communicate with you, or to make our services better.</p>

<h4>2. How We Use Information</h4>
<p>We use the information we collect in various ways, including to:</p>
<ul>
    <li>Provide, operate, and maintain our website</li>
    <li>Improve, personalize, and expand our website</li>
    <li>Understand and analyze how you use our website</li>
    <li>Communicate with you, either directly or through one of our partners</li>
</ul>

<h4>3. Log Files</h4>
<p>SingleEvent follows a standard procedure of using log files. These files log visitors when they visit websites. The information collected by log files include internet protocol (IP) addresses, browser type, Internet Service Provider (ISP), date and time stamp, referring/exit pages, and possibly the number of clicks.</p>

<h4>4. Cookies</h4>
<p>Like any other website, SingleEvent uses cookies. These cookies are used to store information including visitors\' preferences, and the pages on the website that the visitor accessed or visited.</p>

<h4>5. Privacy Policy Changes</h4>
<p>Although most changes are likely to be minor, SingleEvent may change its Privacy Policy from time to time, and in SingleEvent\'s sole discretion.</p>'
        ]);
    }
}
