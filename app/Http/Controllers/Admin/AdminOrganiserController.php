<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Organiser;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminOrganiserController extends Controller
{
    /**
     * Display a listing of organisers.
     */
    public function index()
    {
        $organisers = Organiser::all();
        return view('admin.organiser.index', compact('organisers'));
    }

    /**
     * Show the form for creating a new organiser.
     */
    public function create()
    {
        return view('admin.organiser.create');
    }

    /**
     * Store a newly created organiser in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:20',
            'biography' => 'nullable|string',
            'address' => 'nullable|string',
            'facebook' => 'nullable|url',
            'instagram' => 'nullable|url',
            'twitter' => 'nullable|url',
            'linkedin' => 'nullable|url',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->name);

        // Handle photo upload
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $filename = time() . '_' . $photo->getClientOriginalName();
            $photo->move(public_path('uploads'), $filename);
            $data['photo'] = $filename;
        }

        Organiser::create($data);

        return redirect()->route('admin_organiser_index')
                        ->with('success', 'Organiser created successfully.');
    }

    /**
     * Display the specified organiser.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified organiser.
     */
    public function edit(string $id)
    {
        $organiser = Organiser::findOrFail($id);
        return view('admin.organiser.edit', compact('organiser'));
    }

    /**
     * Update the specified organiser in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:20',
            'biography' => 'nullable|string',
            'address' => 'nullable|string',
            'facebook' => 'nullable|url',
            'instagram' => 'nullable|url',
            'twitter' => 'nullable|url',
            'linkedin' => 'nullable|url',
        ]);

        $organiser = Organiser::findOrFail($id);
        $data = $request->all();
        $data['slug'] = Str::slug($request->name);

        // Handle photo upload
        if ($request->hasFile('photo')) {
            // Delete old photo if exists
            if ($organiser->photo && file_exists(public_path('uploads/' . $organiser->photo))) {
                unlink(public_path('uploads/' . $organiser->photo));
            }

            $photo = $request->file('photo');
            $filename = time() . '_' . $photo->getClientOriginalName();
            $photo->move(public_path('uploads'), $filename);
            $data['photo'] = $filename;
        }

        $organiser->update($data);

        return redirect()->route('admin_organiser_index')
                        ->with('success', 'Organiser updated successfully.');
    }

    /**
     * Remove the specified organiser from storage.
     */
    public function destroy(string $id)
    {
        $organiser = Organiser::findOrFail($id);

        // Delete photo if exists
        if ($organiser->photo && file_exists(public_path('uploads/' . $organiser->photo))) {
            unlink(public_path('uploads/' . $organiser->photo));
        }

        $organiser->delete();

        return redirect()->route('admin_organiser_index')
                        ->with('success', 'Organiser deleted successfully.');
    }
}
