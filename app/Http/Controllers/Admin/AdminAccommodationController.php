<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Accommodation;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminAccommodationController extends Controller
{
    /**
     * Display a listing of accommodations.
     */
    public function index()
    {
        $accommodations = Accommodation::all();
        return view('admin.accommodation.index', compact('accommodations'));
    }

    /**
     * Show the form for creating a new accommodation.
     */
    public function create()
    {
        return view('admin.accommodation.create');
    }

    /**
     * Store a newly created accommodation in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240', // 10MB = 10240KB
            'address' => 'required|string',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:20',
            'website' => 'nullable|url',
        ]);

        $data = $request->all();

        // Handle photo upload
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads'), $imageName);
            $data['photo'] = $imageName;
        }

        Accommodation::create($data);

        return redirect()->route('admin_accommodation_index')->with('success', 'Accommodation created successfully!');
    }

    /**
     * Show the form for editing the specified accommodation.
     */
    public function edit($id)
    {
        $accommodation = Accommodation::findOrFail($id);
        return view('admin.accommodation.edit', compact('accommodation'));
    }

    /**
     * Update the specified accommodation in storage.
     */
    public function update(Request $request, $id)
    {
        $accommodation = Accommodation::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240', // 10MB = 10240KB
            'address' => 'required|string',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:20',
            'website' => 'nullable|url',
        ]);

        $data = $request->all();

        // Handle photo upload
        if ($request->hasFile('photo')) {
            // Delete old photo if exists
            if ($accommodation->photo && file_exists(public_path('uploads/'.$accommodation->photo))) {
                unlink(public_path('uploads/'.$accommodation->photo));
            }

            $image = $request->file('photo');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads'), $imageName);
            $data['photo'] = $imageName;
        }

        $accommodation->update($data);

        return redirect()->route('admin_accommodation_index')->with('success', 'Accommodation updated successfully!');
    }

    /**
     * Remove the specified accommodation from storage.
     */
    public function destroy($id)
    {
        $accommodation = Accommodation::findOrFail($id);

        // Delete photo if exists
        if ($accommodation->photo && file_exists(public_path('uploads/'.$accommodation->photo))) {
            unlink(public_path('uploads/'.$accommodation->photo));
        }

        $accommodation->delete();

        return redirect()->route('admin_accommodation_index')->with('success', 'Accommodation deleted successfully!');
    }
}
