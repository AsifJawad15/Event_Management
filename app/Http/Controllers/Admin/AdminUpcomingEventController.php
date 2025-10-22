<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UpcomingEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminUpcomingEventController extends Controller
{
    /**
     * Display a listing of upcoming events
     */
    public function index()
    {
        $upcomingEvents = UpcomingEvent::select(['id', 'title', 'description', 'image', 'event_date', 'status', 'order'])
                                        ->ordered()
                                        ->get();
        return view('admin.upcoming_event.index', compact('upcomingEvents'));
    }

    /**
     * Show the form for creating a new upcoming event
     */
    public function create()
    {
        return view('admin.upcoming_event.create');
    }

    /**
     * Store a newly created upcoming event in storage
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'event_date' => 'required|date|after_or_equal:today',
            'status' => 'required|in:active,inactive',
            'order' => 'required|integer|min:0'
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $validated['image'] = $this->uploadImage($request->file('image'));
        }

        UpcomingEvent::create($validated);

        return redirect()->route('admin_event_selection')
                        ->with('success', 'Upcoming event added successfully!');
    }

    /**
     * Show the form for editing the specified upcoming event
     */
    public function edit($id)
    {
        $upcomingEvent = UpcomingEvent::findOrFail($id);
        return view('admin.upcoming_event.edit', compact('upcomingEvent'));
    }

    /**
     * Update the specified upcoming event in storage
     */
    public function update(Request $request, $id)
    {
        $upcomingEvent = UpcomingEvent::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'event_date' => 'required|date|after_or_equal:today',
            'status' => 'required|in:active,inactive',
            'order' => 'required|integer|min:0'
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $this->deleteImage($upcomingEvent->image);
            $validated['image'] = $this->uploadImage($request->file('image'));
        }

        $upcomingEvent->update($validated);

        return redirect()->route('admin_event_selection')
                        ->with('success', 'Upcoming event updated successfully!');
    }

    /**
     * Remove the specified upcoming event from storage
     */
    public function destroy($id)
    {
        $upcomingEvent = UpcomingEvent::findOrFail($id);

        $this->deleteImage($upcomingEvent->image);
        $upcomingEvent->delete();

        return redirect()->route('admin_event_selection')
                        ->with('success', 'Upcoming event deleted successfully!');
    }

    /**
     * Upload image and return filename
     */
    private function uploadImage($file)
    {
        $imageName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('uploads'), $imageName);
        return $imageName;
    }

    /**
     * Delete image from storage
     */
    private function deleteImage($imageName)
    {
        if ($imageName && file_exists(public_path('uploads/' . $imageName))) {
            unlink(public_path('uploads/' . $imageName));
        }
    }
}
