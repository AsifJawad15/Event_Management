<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HomeBanner;
use App\Models\HomeWelcome;
use App\Models\HomeCounter;
use App\Models\Speaker;
use App\Models\ScheduleDay;
use App\Models\SponsorCategory;
use App\Models\Sponsor;
use App\Models\Organiser;
use App\Models\Accommodation;
use App\Models\Photo;
use App\Models\Video;
use App\Models\Faq;
use App\Models\Testimonial;
use App\Models\Post;
use App\Models\Package;
use App\Models\PackageFacility;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

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

        // Get home counter data
        $homeCounter = HomeCounter::where('status', 'show')->first();

        // Get speakers for homepage (limit to 4)
        $speakers = Speaker::limit(4)->get();

        return view('front.home', compact('banner', 'welcome', 'homeCounter', 'speakers'));
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

    public function speakers()
    {
        $speakers = Speaker::all();
        return view('front.speakers', compact('speakers'));
    }

    public function speaker($slug)
    {
        $speaker = Speaker::where('slug', $slug)->firstOrFail();
        $schedules = $speaker->schedules()->with('scheduleDay')->get();
        return view('front.speaker', compact('speaker', 'schedules'));
    }

    public function schedule()
    {
        $schedule_days = ScheduleDay::with(['schedules' => function($query) {
            $query->with('speakers');
        }])->orderBy('order1', 'asc')->get();
        return view('front.schedule', compact('schedule_days'));
    }

    public function sponsors()
    {
        $sponsor_categories = SponsorCategory::with('sponsors')->get();
        return view('front.sponsors', compact('sponsor_categories'));
    }

    public function sponsor($slug)
    {
        $sponsor = Sponsor::where('slug', $slug)->with('sponsorCategory')->firstOrFail();
        return view('front.sponsor', compact('sponsor'));
    }

    public function organisers()
    {
        $organisers = Organiser::all();
        return view('front.organisers', compact('organisers'));
    }

    public function organiser($slug)
    {
        $organiser = Organiser::where('slug', $slug)->firstOrFail();
        return view('front.organiser', compact('organiser'));
    }

    public function accommodations()
    {
        $accommodations = Accommodation::all();
        return view('front.accommodations', compact('accommodations'));
    }

    public function photo_gallery()
    {
        $photos = Photo::latest()->paginate(6); // 6 photos per page
        return view('front.photo_gallery', compact('photos'));
    }

    public function video_gallery()
    {
        $videos = Video::latest()->paginate(6); // 6 videos per page
        return view('front.video_gallery', compact('videos'));
    }

    public function faq()
    {
        $faqs = Faq::latest()->get(); // Get all FAQs for accordion display
        return view('front.faq', compact('faqs'));
    }

    public function testimonials()
    {
        $testimonials = Testimonial::latest()->get(); // Get all testimonials for carousel
        return view('front.testimonials', compact('testimonials'));
    }

    public function blog()
    {
        $posts = Post::latest()->paginate(6); // 6 posts per page, matching the grid layout
        return view('front.blog', compact('posts'));
    }

    public function post($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        return view('front.post', compact('post'));
    }

    public function pricing()
    {
        $packages = Package::with('facilities')->orderByItemOrder()->get();
        return view('front.pricing', compact('packages'));
    }
}
