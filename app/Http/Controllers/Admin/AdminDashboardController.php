<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use App\Models\Post;
use App\Models\Speaker;
use App\Models\ScheduleDay;
use App\Models\Sponsor;
use App\Models\Organiser;
use App\Models\User;
use App\Models\Package;
use App\Models\Ticket;
use App\Models\Subscriber;
use App\Models\Photo;
use App\Models\Video;
use App\Models\UpcomingEvent;

class AdminDashboardController extends Controller
{
    public function event_selection()
    {
        // Use model scopes to ensure correct ordering by 'order' then 'event_date'
        $upcoming_events = UpcomingEvent::active()->ordered()->get();
        return view('admin.event_selection', compact('upcoming_events'));
    }

    public function dashboard($event_id)
    {
        // Verify event exists
        $event = UpcomingEvent::findOrFail($event_id);

        $total_posts = Post::count();
        $total_speakers = Speaker::count();
        $total_schedule_days = ScheduleDay::count();
        $total_sponsors = Sponsor::count();
        $total_organisers = Organiser::count();
        $total_attendees = User::count();
        $total_packages = Package::count();
        $total_tickets = Ticket::count();
        $total_subscribers = Subscriber::count();
        $total_photos = Photo::count();
        $total_videos = Video::count();

        $tickets = Ticket::with(['package','user'])->orderBy('id','desc')->get()->take(3);

        return view('admin.dashboard', compact('event', 'total_posts', 'total_speakers', 'total_schedule_days', 'total_sponsors', 'total_organisers', 'total_attendees', 'total_packages', 'total_tickets', 'total_subscribers', 'total_photos', 'total_videos', 'tickets'));
    }

    public function profile_update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins,email,' . auth()->guard('admin')->id(),
            'new_password' => 'nullable|string|confirmed:retype_password',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $admin = auth()->guard('admin')->user();

        // Update basic info
        $admin->name = $request->name;
        $admin->email = $request->email;

        // Update password if provided
        if ($request->filled('new_password')) {
            $admin->password = bcrypt($request->new_password);
        }

        // Handle photo upload
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $imageName = 'admin_' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads'), $imageName);
            $admin->photo = $imageName;
        }

        $admin->save();

        return redirect()->back()->with('success', 'Profile updated successfully');
    }

}
