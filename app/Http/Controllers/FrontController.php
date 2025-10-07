<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HomeBanner;
use App\Models\HomeWelcome;
use App\Models\HomeCounter;
use App\Models\HomeSpeaker;
use App\Models\HomePricing;
use App\Models\HomeBlog;
use App\Models\HomeSponsor;
use App\Models\Speaker;
use App\Models\ScheduleDay;
use App\Models\Message;
use App\Models\SponsorCategory;
use App\Models\Sponsor;
use App\Models\Organiser;
use App\Models\Accommodation;
use App\Models\Photo;
use App\Models\Video;
use App\Models\Faq;
use App\Models\Post;
use App\Models\Package;
use App\Models\PackageFacility;
use App\Models\Ticket;
use App\Models\Admin;
use App\Models\ContactPageItem;
use App\Models\TermPageItem;
use App\Models\PrivacyPageItem;
use App\Models\Subscriber;
use App\Mail\Websitemail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Xenon\NagadApi\Helper;
use Xenon\NagadApi\Base;

class FrontController extends Controller
{
    public function welcome()
    {
        $setting_data = \App\Models\Setting::where('id',1)->first();
        return view('front.welcome', compact('setting_data'));
    }

    public function home()
    {
        $home_banner = HomeBanner::where('id',1)->first();
        $home_welcome = HomeWelcome::where('id',1)->first();
        $home_counter = HomeCounter::where('id',1)->first();
        $home_speaker = HomeSpeaker::where('id',1)->first();
        $home_pricing = HomePricing::where('id',1)->first();
        $home_blog = HomeBlog::where('id',1)->first();
        $home_sponsor = HomeSponsor::where('id',1)->first();

        $speakers = Speaker::get()->take($home_speaker->how_many ?? 4);
        $packages = Package::with('facilities')->orderByItemOrder()->get()->take($home_pricing->how_many ?? 3);
        $posts = Post::orderBy('id','desc')->get()->take($home_blog->how_many ?? 3);
        $sponsors = Sponsor::get()->take($home_sponsor->how_many ?? 8);

        return view('front.home', compact('home_banner','home_welcome','home_counter', 'home_speaker','home_pricing','home_blog','home_sponsor','speakers', 'packages', 'posts', 'sponsors'));
    }

    public function about()
    {
        return view('front.about');
    }

    public function contact()
    {
        $contact_page_data = ContactPageItem::where('id',1)->first();
        return view('front.contact', compact('contact_page_data'));
    }

    public function contact_submit(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email'],
            'subject' => ['required'],
            'message' => ['required'],
        ]);

        $admin = Admin::first();

        $subject = "Contact Message";
        $message = "Visitor Information:<br><br>";
        $message .= "<b>Name:</b><br>".$request->name."<br><br>";
        $message .= "<b>Email:</b><br>".$request->email."<br><br>";
        $message .= "<b>Subject:</b><br>".$request->subject."<br><br>";
        $message .= "<b>Message:</b><br>".$request->message."<br><br>";

        if($admin) {
            \Mail::to($admin->email)->send(new Websitemail($subject,$message));
        }

        return redirect()->back()->with('success','Message is sent successfully!');
    }

    public function term()
    {
        $term_page_data = TermPageItem::where('id',1)->first();
        return view('front.term', compact('term_page_data'));
    }

    public function privacy()
    {
        $privacy_page_data = PrivacyPageItem::where('id',1)->first();
        return view('front.privacy', compact('privacy_page_data'));
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

        // Get home banner for background
        $banner = HomeBanner::active()->ordered()->first();

        // If no banner exists, create a default one
        if (!$banner) {
            $banner = new HomeBanner([
                'heading' => 'Event and Conference Website',
                'subheading' => 'September 7, 2025, California',
                'text' => 'Join us at our next networking event and conference!',
                'background' => 'dist-front/images/banner-home.jpg',
                'event_date' => '2025-09-07',
                'event_time' => '13:00:00',
                'button_text' => 'BUY TICKETS',
                'button_url' => '/buy',
                'status' => 1
            ]);
        }

        return view('front.pricing', compact('packages', 'banner'));
    }

    public function buy_ticket($id)
    {
        // Check if ticket purchase is still available from settings
        $setting = \App\Models\Setting::where('id', 1)->first();
        if ($setting && $setting->ticket_purchase_expire_date < date('Y-m-d')) {
            return redirect()->route('front.home')->with('error', 'Ticket purchase date is expired!');
        }

        // Get the package
        $package = Package::where('id', $id)->first();
        if (!$package) {
            return redirect()->route('front.pricing')->with('error', 'Package not found!');
        }

        // Get home banner for background
        $banner = HomeBanner::active()->ordered()->first();

        // If no banner exists, create a default one
        if (!$banner) {
            $banner = new HomeBanner([
                'heading' => 'Event and Conference Website',
                'subheading' => 'September 7, 2025, California',
                'text' => 'Join us at our next networking event and conference!',
                'background' => 'dist-front/images/banner-home.jpg',
                'event_date' => '2025-09-07',
                'event_time' => '13:00:00',
                'button_text' => 'BUY TICKETS',
                'button_url' => '/buy',
                'status' => 1
            ]);
        }

        return view('front.buy_ticket', compact('package', 'banner'));
    }

    public function payment(Request $request)
    {
        $package_id = $request->package_id;
        $unit_price = $request->unit_price;
        $quantity = $request->quantity;
        $price = $unit_price * $quantity;

        if($request->payment_method == "bKash")
        {
            // bKash Start - Dummy Implementation
            session()->put('package_id', $request->package_id);
            session()->put('package_name', $request->package_name);
            session()->put('quantity', $request->quantity);
            session()->put('unit_price', $request->unit_price);
            session()->put('price', $price);

            session()->put('billing_name', $request->billing_name);
            session()->put('billing_email', $request->billing_email);
            session()->put('billing_phone', $request->billing_phone);
            session()->put('billing_address', $request->billing_address);
            session()->put('billing_country', $request->billing_country);
            session()->put('billing_state', $request->billing_state);
            session()->put('billing_city', $request->billing_city);
            session()->put('billing_zip', $request->billing_zip);
            session()->put('billing_note', $request->billing_note);

            // For demo purposes, redirect to a dummy bKash page
            return view('front.bkash_payment', compact('price'));
            // bKash End
        }
        elseif($request->payment_method == "Nagad")
        {
            // Nagad Start - Dummy Implementation
            session()->put('package_id', $request->package_id);
            session()->put('package_name', $request->package_name);
            session()->put('quantity', $request->quantity);
            session()->put('unit_price', $request->unit_price);
            session()->put('price', $price);

            session()->put('billing_name', $request->billing_name);
            session()->put('billing_email', $request->billing_email);
            session()->put('billing_phone', $request->billing_phone);
            session()->put('billing_address', $request->billing_address);
            session()->put('billing_country', $request->billing_country);
            session()->put('billing_state', $request->billing_state);
            session()->put('billing_city', $request->billing_city);
            session()->put('billing_zip', $request->billing_zip);
            session()->put('billing_note', $request->billing_note);

            // For demo purposes, redirect to a dummy Nagad page
            return view('front.nagad_payment', compact('price'));
            // Nagad End
        }
        else
        {
            // Bank Start
            session()->put('package_id', $request->package_id);
            session()->put('package_name', $request->package_name);
            session()->put('quantity', $request->quantity);
            session()->put('unit_price', $request->unit_price);
            session()->put('price', $price);

            session()->put('billing_name', $request->billing_name);
            session()->put('billing_email', $request->billing_email);
            session()->put('billing_phone', $request->billing_phone);
            session()->put('billing_address', $request->billing_address);
            session()->put('billing_country', $request->billing_country);
            session()->put('billing_state', $request->billing_state);
            session()->put('billing_city', $request->billing_city);
            session()->put('billing_zip', $request->billing_zip);
            session()->put('billing_note', $request->billing_note);

            return view('front.bank');
            // Bank End
        }
    }

    public function bkash_success(Request $request)
    {
        // Generate unique number
        $unique_number = time().rand(1000,9999);

        // Insert data into database
        $ticket = new Ticket;
        $ticket->user_id = Auth::guard('web')->user()->id;
        $ticket->package_id = session()->get('package_id');
        $ticket->payment_id = $unique_number;
        $ticket->package_name = session()->get('package_name');
        $ticket->billing_name = session()->get('billing_name');
        $ticket->billing_email = session()->get('billing_email');
        $ticket->billing_phone = session()->get('billing_phone');
        $ticket->billing_address = session()->get('billing_address');
        $ticket->billing_country = session()->get('billing_country');
        $ticket->billing_state = session()->get('billing_state');
        $ticket->billing_city = session()->get('billing_city');
        $ticket->billing_zip = session()->get('billing_zip');
        $ticket->billing_note = session()->get('billing_note');
        $ticket->payment_method = "bKash";
        $ticket->payment_currency = "BDT";
        $ticket->payment_status = 'Completed';
        $ticket->transaction_id = 'BKS'.time().rand(1000,9999);
        $ticket->bank_transaction_info = '';
        $ticket->per_ticket_price = session()->get('unit_price');
        $ticket->total_tickets = session()->get('quantity');
        $ticket->total_price = session()->get('price');
        $ticket->save();

        // Clear session
        session()->forget(['package_id', 'package_name', 'quantity', 'unit_price', 'price',
                          'billing_name', 'billing_email', 'billing_phone', 'billing_address',
                          'billing_country', 'billing_state', 'billing_city', 'billing_zip', 'billing_note']);

        return redirect()->route('user.dashboard')->with('success','Payment is successful!');
    }

    public function bkash_cancel()
    {
        return redirect()->route('user.dashboard')->with('error','Payment is cancelled!');
    }

    public function nagad_success(Request $request)
    {
        // Generate unique number
        $unique_number = time().rand(1000,9999);

        $ticket = new Ticket;
        $ticket->user_id = Auth::guard('web')->user()->id;
        $ticket->package_id = session()->get('package_id');
        $ticket->payment_id = $unique_number;
        $ticket->package_name = session()->get('package_name');
        $ticket->billing_name = session()->get('billing_name');
        $ticket->billing_email = session()->get('billing_email');
        $ticket->billing_phone = session()->get('billing_phone');
        $ticket->billing_address = session()->get('billing_address');
        $ticket->billing_country = session()->get('billing_country');
        $ticket->billing_state = session()->get('billing_state');
        $ticket->billing_city = session()->get('billing_city');
        $ticket->billing_zip = session()->get('billing_zip');
        $ticket->billing_note = session()->get('billing_note');
        $ticket->payment_method = "Nagad";
        $ticket->payment_currency = "BDT";
        $ticket->payment_status = 'Completed';
        $ticket->transaction_id = 'NGD'.time().rand(1000,9999);
        $ticket->bank_transaction_info = '';
        $ticket->per_ticket_price = session()->get('unit_price');
        $ticket->total_tickets = session()->get('quantity');
        $ticket->total_price = session()->get('price');
        $ticket->save();

        // Clear session
        session()->forget(['package_id', 'package_name', 'quantity', 'unit_price', 'price',
                          'billing_name', 'billing_email', 'billing_phone', 'billing_address',
                          'billing_country', 'billing_state', 'billing_city', 'billing_zip', 'billing_note']);

        return redirect()->route('user.dashboard')->with('success','Payment is successful!');
    }

    public function nagad_cancel()
    {
        return redirect()->route('user.dashboard')->with('error','Payment is cancelled!');
    }

    public function bank_success(Request $request)
    {
        if($request->bank_transaction_info == '') {
            return redirect()->route('front.buy_ticket',session()->get('package_id'))->with('error','Please enter the bank transaction information!');
        }

        $unique_number = time().rand(1000,9999);

        $ticket = new Ticket;
        $ticket->user_id = Auth::guard('web')->user()->id;
        $ticket->package_id = session()->get('package_id');
        $ticket->payment_id = $unique_number;
        $ticket->package_name = session()->get('package_name');
        $ticket->billing_name = session()->get('billing_name');
        $ticket->billing_email = session()->get('billing_email');
        $ticket->billing_phone = session()->get('billing_phone');
        $ticket->billing_address = session()->get('billing_address');
        $ticket->billing_country = session()->get('billing_country');
        $ticket->billing_state = session()->get('billing_state');
        $ticket->billing_city = session()->get('billing_city');
        $ticket->billing_zip = session()->get('billing_zip');
        $ticket->billing_note = session()->get('billing_note');
        $ticket->payment_method = "Bank";
        $ticket->payment_currency = "BDT";
        $ticket->payment_status = 'Pending';
        $ticket->transaction_id = "";
        $ticket->bank_transaction_info = $request->bank_transaction_info;
        $ticket->per_ticket_price = session()->get('unit_price');
        $ticket->total_tickets = session()->get('quantity');
        $ticket->total_price = session()->get('price');
        $ticket->save();

        // Clear session
        session()->forget(['package_id', 'package_name', 'quantity', 'unit_price', 'price',
                          'billing_name', 'billing_email', 'billing_phone', 'billing_address',
                          'billing_country', 'billing_state', 'billing_city', 'billing_zip', 'billing_note']);

        return redirect()->route('user.dashboard')->with('success','Payment Information that you provided will be verified by admin and then it will be successful!');
    }

    public function attendee_tickets()
    {
        // Check if user is authenticated
        if (!Auth::guard('web')->check()) {
            return redirect()->route('login')->with('error', 'Please login to view your tickets.');
        }

        $user = Auth::guard('web')->user();

        $tickets = Ticket::with(['package', 'user'])
                         ->where('user_id', $user->id)
                         ->orderBy('created_at', 'desc')
                         ->get();

        return view('user.ticket', compact('tickets'));
    }

    public function attendee_invoice($id)
    {
        $ticket = Ticket::with(['package', 'user'])
                        ->where('id', $id)
                        ->where('user_id', Auth::guard('web')->user()->id)
                        ->first();

        if (!$ticket) {
            return redirect()->route('attendee.tickets')->with('error', 'Ticket not found!');
        }

        $admin = Admin::first();
        $setting = \App\Models\Setting::where('id', 1)->first();

        // Create setting_data object for banner
        $setting_data = (object) [
            'banner' => 'dist-front/images/banner.jpg'
        ];

        return view('user.invoice', compact('ticket', 'admin', 'setting', 'setting_data'));
    }

    public function message()
    {
        $messages = Message::orderBy('id','asc')->where('user_id',Auth::guard('web')->user()->id)->get();
        $admin = Admin::first(); // Get the first admin instead of specifically id=1

        // If no admin exists, create a default admin object to prevent errors
        if (!$admin) {
            $admin = new Admin();
            $admin->name = 'Admin';
            $admin->email = 'admin@example.com';
            $admin->photo = 'default.png';
        }

        return view('user.message', compact('messages', 'admin'));
    }

    public function message_submit(Request $request)
    {
        $request->validate([
            'message' => ['required'],
        ]);

        $message = new Message();
        $message->user_id = Auth::guard('web')->user()->id;
        $message->admin_id = 0;
        $message->message = $request->message;
        $message->save();

        $admin = Admin::first(); // Get the first admin

        // Only send email if admin exists
        if ($admin) {
            $link = url('admin/message/detail/'.Auth::guard('web')->user()->id);
            $subject = "Message from Attendee";
            $message_text = 'Please click on the following link to view the message from attendee:<br>';
            $message_text .= '<a href="'.$link.'">'.$link.'</a>';

            \Mail::to($admin->email)->send(new Websitemail($subject,$message_text));
        }

        return redirect()->back()->with('success','Message is sent successfully!');
    }

    public function subscribe_submit(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email', 'unique:subscribers'],
        ]);

        // Save data into database
        $subscriber = new Subscriber;
        $subscriber->email = $request->email;
        $subscriber->token = hash('sha256',time());
        $subscriber->save();

        // Create link and Send email
        $verification_link = url('subscriber-verify/'.$subscriber->token.'/'.$request->email);
        $subject = "Subscription Verification";
        $message = "To complete the subscription, please click on the link below:<br>";
        $message .= "<a href='".$verification_link."'>Click Here</a>";

        \Mail::to($request->email)->send(new Websitemail($subject,$message));

        return redirect()->back()->with('success','Verification email sent! Please check your inbox to verify your subscription.');
    }

    public function subscriber_verify($token,$email)
    {
        $subscriber = Subscriber::where('token',$token)->where('email',$email)->first();
        if(!$subscriber) {
            return redirect()->route('front.home')->with('error', 'Invalid verification link!');
        }
        $subscriber->token = '';
        $subscriber->status = 'active';
        $subscriber->update();

        return redirect()->route('front.home')->with('success', 'Subscription verified successfully! You will receive future updates and latest news from us.');
    }
}
