<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HomeBanner;
use App\Models\HomeWelcome;

class FrontController extends Controller
{
    public function home()
    {
        $banner = HomeBanner::active()->ordered()->first();

        // If no banner exists, create a default one
        if (!$banner) {
            $banner = new HomeBanner([
                'heading' => 'Event and Conference Website',
                'subheading' => 'September 7, 2025, California',
                'text' => 'Join us at our next networking event and conference! Connect with industry professionals, engage in insightful discussions, and attend hands-on workshops. Learn from experts, collaborate on innovative ideas, and build lasting relationships.',
                'background' => 'dist-front/images/banner-home.jpg',
                'event_date' => '2025-09-07',
                'event_time' => '13:00:00',
                'button_text' => 'BUY TICKETS',
                'button_url' => '/buy',
                'status' => 1
            ]);
        }

        // Get home welcome data - get first record regardless of status
        // Force fresh query without any caching
        $welcome = HomeWelcome::latest('updated_at')->first();

        return view('front.home', compact('banner', 'welcome'));
    }

    public function about()
    {
        return view('front.about');
    }

    public function contact()
    {
        return view('front.contact');
    }

    public function contact_submit(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:1000'
        ]);

        // Here you can add logic to send email or save to database
        // For now, we'll just redirect back with success message

        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }
}
