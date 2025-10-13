<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminEventController extends Controller
{
    public function index()
    {
        $events = Event::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.event.index', compact('events'));
    }

    public function create()
    {
        return view('admin.event.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'location' => 'nullable|string|max:255',
            'venue' => 'nullable|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'start_time' => 'nullable',
            'end_time' => 'nullable',
            'banner_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'thumbnail_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:Draft,Published,Completed,Cancelled',
            'is_featured' => 'nullable|boolean',
            'max_attendees' => 'nullable|integer|min:1',
            'price' => 'nullable|numeric|min:0',
            'tags' => 'nullable|string',
            'organizer_name' => 'nullable|string|max:255',
            'organizer_email' => 'nullable|email|max:255',
            'organizer_phone' => 'nullable|string|max:20',
        ]);

        $data = $request->except(['banner_image', 'thumbnail_image']);
        $data['slug'] = Str::slug($request->name);
        $data['is_featured'] = $request->has('is_featured') ? 1 : 0;

        // Handle banner image upload
        if ($request->hasFile('banner_image')) {
            $banner = $request->file('banner_image');
            $bannerName = 'event_banner_' . time() . '.' . $banner->getClientOriginalExtension();
            $banner->move(public_path('uploads'), $bannerName);
            $data['banner_image'] = $bannerName;
        }

        // Handle thumbnail image upload
        if ($request->hasFile('thumbnail_image')) {
            $thumbnail = $request->file('thumbnail_image');
            $thumbnailName = 'event_thumb_' . time() . '.' . $thumbnail->getClientOriginalExtension();
            $thumbnail->move(public_path('uploads'), $thumbnailName);
            $data['thumbnail_image'] = $thumbnailName;
        }

        Event::create($data);

        return redirect()->route('admin_event_index')->with('success', 'Event created successfully!');
    }

    public function edit($id)
    {
        $event = Event::findOrFail($id);
        return view('admin.event.edit', compact('event'));
    }

    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'location' => 'nullable|string|max:255',
            'venue' => 'nullable|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'start_time' => 'nullable',
            'end_time' => 'nullable',
            'banner_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'thumbnail_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:Draft,Published,Completed,Cancelled',
            'is_featured' => 'nullable|boolean',
            'max_attendees' => 'nullable|integer|min:1',
            'price' => 'nullable|numeric|min:0',
            'tags' => 'nullable|string',
            'organizer_name' => 'nullable|string|max:255',
            'organizer_email' => 'nullable|email|max:255',
            'organizer_phone' => 'nullable|string|max:20',
        ]);

        $data = $request->except(['banner_image', 'thumbnail_image']);
        $data['slug'] = Str::slug($request->name);
        $data['is_featured'] = $request->has('is_featured') ? 1 : 0;

        // Handle banner image upload
        if ($request->hasFile('banner_image')) {
            // Delete old image
            if ($event->banner_image && file_exists(public_path('uploads/' . $event->banner_image))) {
                unlink(public_path('uploads/' . $event->banner_image));
            }
            $banner = $request->file('banner_image');
            $bannerName = 'event_banner_' . time() . '.' . $banner->getClientOriginalExtension();
            $banner->move(public_path('uploads'), $bannerName);
            $data['banner_image'] = $bannerName;
        }

        // Handle thumbnail image upload
        if ($request->hasFile('thumbnail_image')) {
            // Delete old image
            if ($event->thumbnail_image && file_exists(public_path('uploads/' . $event->thumbnail_image))) {
                unlink(public_path('uploads/' . $event->thumbnail_image));
            }
            $thumbnail = $request->file('thumbnail_image');
            $thumbnailName = 'event_thumb_' . time() . '.' . $thumbnail->getClientOriginalExtension();
            $thumbnail->move(public_path('uploads'), $thumbnailName);
            $data['thumbnail_image'] = $thumbnailName;
        }

        $event->update($data);

        return redirect()->route('admin_event_index')->with('success', 'Event updated successfully!');
    }

    public function destroy($id)
    {
        $event = Event::findOrFail($id);

        // Delete images
        if ($event->banner_image && file_exists(public_path('uploads/' . $event->banner_image))) {
            unlink(public_path('uploads/' . $event->banner_image));
        }
        if ($event->thumbnail_image && file_exists(public_path('uploads/' . $event->thumbnail_image))) {
            unlink(public_path('uploads/' . $event->thumbnail_image));
        }

        $event->delete();

        return redirect()->route('admin_event_index')->with('success', 'Event deleted successfully!');
    }
}
