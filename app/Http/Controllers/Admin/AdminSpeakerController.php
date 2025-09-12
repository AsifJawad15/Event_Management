<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Speaker;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminSpeakerController extends Controller
{
    public function index()
    {
        $speakers = Speaker::orderBy('id', 'desc')->get();
        return view('admin.speaker.index', compact('speakers'));
    }

    public function create()
    {
        return view('admin.speaker.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:speakers,email',
            'phone' => 'required|string|max:255',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:10240',
            'designation' => 'required|string|max:255',
            'biography' => 'required|string',
            'address' => 'required|string',
            'website' => 'nullable|url',
            'facebook' => 'nullable|url',
            'twitter' => 'nullable|url',
            'linkedin' => 'nullable|url',
            'instagram' => 'nullable|url'
        ]);

        // Handle photo upload
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = 'speaker_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/'), $filename);
            $request->merge(['photo' => $filename]);
        }

        // Generate slug from name
        $slug = Str::slug($request->name);
        $request->merge(['slug' => $slug]);

        Speaker::create($request->all());

        return redirect()->route('admin_speaker_index')->with('success', 'Speaker created successfully!');
    }

    public function edit($id)
    {
        $speaker = Speaker::findOrFail($id);
        return view('admin.speaker.edit', compact('speaker'));
    }

    public function update(Request $request, $id)
    {
        $speaker = Speaker::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:speakers,email,' . $id,
            'phone' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
            'designation' => 'required|string|max:255',
            'biography' => 'required|string',
            'address' => 'required|string',
            'website' => 'nullable|url',
            'facebook' => 'nullable|url',
            'twitter' => 'nullable|url',
            'linkedin' => 'nullable|url',
            'instagram' => 'nullable|url'
        ]);

        // Handle photo upload
        if ($request->hasFile('photo')) {
            // Delete old photo if exists
            if ($speaker->photo && file_exists(public_path('uploads/'.$speaker->photo))) {
                unlink(public_path('uploads/'.$speaker->photo));
            }

            $file = $request->file('photo');
            $filename = 'speaker_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/'), $filename);
            $request->merge(['photo' => $filename]);
        }

        // Generate new slug if name changed
        if ($request->name !== $speaker->name) {
            $slug = Str::slug($request->name);
            $request->merge(['slug' => $slug]);
        }

        $speaker->update($request->all());

        return redirect()->route('admin_speaker_index')->with('success', 'Speaker updated successfully!');
    }

    public function destroy($id)
    {
        $speaker = Speaker::findOrFail($id);

        // Delete photo if exists
        if ($speaker->photo && file_exists(public_path('uploads/'.$speaker->photo))) {
            unlink(public_path('uploads/'.$speaker->photo));
        }

        $speaker->delete();

        return redirect()->route('admin_speaker_index')->with('success', 'Speaker deleted successfully!');
    }
}
