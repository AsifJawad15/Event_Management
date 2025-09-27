<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Photo;
use Illuminate\Http\Request;

class AdminPhotoController extends Controller
{
    /**
     * Display a listing of photos.
     */
    public function index()
    {
        $photos = Photo::latest()->paginate(6); // 6 photos per page
        return view('admin.photo_gallery.index', compact('photos'));
    }

    /**
     * Show the form for creating a new photo.
     */
    public function create()
    {
        return view('admin.photo_gallery.create');
    }

    /**
     * Store a newly created photo in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'caption' => 'required|string|max:255',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:10240', // 10MB = 10240KB
        ]);

        $data = $request->all();

        // Handle photo upload
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads'), $imageName);
            $data['photo'] = $imageName;
        }

        Photo::create($data);

        return redirect()->route('admin_photo_index')->with('success', 'Photo added successfully!');
    }

    /**
     * Show the form for editing the specified photo.
     */
    public function edit($id)
    {
        $photo = Photo::findOrFail($id);
        return view('admin.photo_gallery.edit', compact('photo'));
    }

    /**
     * Update the specified photo in storage.
     */
    public function update(Request $request, $id)
    {
        $photo = Photo::findOrFail($id);

        $request->validate([
            'caption' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240', // 10MB = 10240KB
        ]);

        $data = $request->all();

        // Handle photo upload
        if ($request->hasFile('photo')) {
            // Delete old photo if exists
            if ($photo->photo && file_exists(public_path('uploads/' . $photo->photo))) {
                unlink(public_path('uploads/' . $photo->photo));
            }

            $image = $request->file('photo');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads'), $imageName);
            $data['photo'] = $imageName;
        } else {
            // Keep existing photo if no new photo uploaded
            unset($data['photo']);
        }

        $photo->update($data);

        return redirect()->route('admin_photo_index')->with('success', 'Photo updated successfully!');
    }

    /**
     * Remove the specified photo from storage.
     */
    public function destroy($id)
    {
        $photo = Photo::findOrFail($id);

        // Delete photo file if exists
        if ($photo->photo && file_exists(public_path('uploads/' . $photo->photo))) {
            unlink(public_path('uploads/' . $photo->photo));
        }

        $photo->delete();

        return redirect()->route('admin_photo_index')->with('success', 'Photo deleted successfully!');
    }
}
