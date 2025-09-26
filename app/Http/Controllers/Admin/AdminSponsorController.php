<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sponsor;
use App\Models\SponsorCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminSponsorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sponsors = Sponsor::with('sponsorCategory')->orderBy('created_at', 'desc')->get();
        $sponsorCategories = SponsorCategory::all();
        return view('admin.sponsor.index', compact('sponsors', 'sponsorCategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sponsorCategories = SponsorCategory::all();
        return view('admin.sponsor.create', compact('sponsorCategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'sponsor_category_id' => 'required|exists:sponsor_categories,id',
            'name' => 'required|string|max:255',
            'tagline' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'featured_photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'address' => 'nullable|string',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:20',
            'website' => 'nullable|url|max:255',
            'facebook' => 'nullable|url|max:255',
            'twitter' => 'nullable|url|max:255',
            'linkedin' => 'nullable|url|max:255',
            'instagram' => 'nullable|url|max:255',
            'map' => 'nullable|string'
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->name);

        // Handle logo upload
        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $logoName = time() . '_logo_' . $logo->getClientOriginalName();
            $logo->move(public_path('uploads'), $logoName);
            $data['logo'] = $logoName;
        }

        // Handle featured photo upload
        if ($request->hasFile('featured_photo')) {
            $featuredPhoto = $request->file('featured_photo');
            $featuredPhotoName = time() . '_featured_' . $featuredPhoto->getClientOriginalName();
            $featuredPhoto->move(public_path('uploads'), $featuredPhotoName);
            $data['featured_photo'] = $featuredPhotoName;
        }

        Sponsor::create($data);

        return redirect()->route('admin_sponsor_index')
            ->with('success', 'Sponsor created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $sponsor = Sponsor::with('sponsorCategory')->findOrFail($id);
        return view('admin.sponsor.show', compact('sponsor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $sponsor = Sponsor::findOrFail($id);
        $sponsorCategories = SponsorCategory::all();
        return view('admin.sponsor.edit', compact('sponsor', 'sponsorCategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $sponsor = Sponsor::findOrFail($id);

        $request->validate([
            'sponsor_category_id' => 'required|exists:sponsor_categories,id',
            'name' => 'required|string|max:255',
            'tagline' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'featured_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'address' => 'nullable|string',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:20',
            'website' => 'nullable|url|max:255',
            'facebook' => 'nullable|url|max:255',
            'twitter' => 'nullable|url|max:255',
            'linkedin' => 'nullable|url|max:255',
            'instagram' => 'nullable|url|max:255',
            'map' => 'nullable|string'
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->name);

        // Handle logo upload
        if ($request->hasFile('logo')) {
            // Delete old logo if exists
            if ($sponsor->logo && file_exists(public_path('uploads/' . $sponsor->logo))) {
                unlink(public_path('uploads/' . $sponsor->logo));
            }

            $logo = $request->file('logo');
            $logoName = time() . '_logo_' . $logo->getClientOriginalName();
            $logo->move(public_path('uploads'), $logoName);
            $data['logo'] = $logoName;
        }

        // Handle featured photo upload
        if ($request->hasFile('featured_photo')) {
            // Delete old featured photo if exists
            if ($sponsor->featured_photo && file_exists(public_path('uploads/' . $sponsor->featured_photo))) {
                unlink(public_path('uploads/' . $sponsor->featured_photo));
            }

            $featuredPhoto = $request->file('featured_photo');
            $featuredPhotoName = time() . '_featured_' . $featuredPhoto->getClientOriginalName();
            $featuredPhoto->move(public_path('uploads'), $featuredPhotoName);
            $data['featured_photo'] = $featuredPhotoName;
        }

        $sponsor->update($data);

        return redirect()->route('admin_sponsor_index')
            ->with('success', 'Sponsor updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $sponsor = Sponsor::findOrFail($id);

        // Delete associated files
        if ($sponsor->logo && file_exists(public_path('uploads/' . $sponsor->logo))) {
            unlink(public_path('uploads/' . $sponsor->logo));
        }

        if ($sponsor->featured_photo && file_exists(public_path('uploads/' . $sponsor->featured_photo))) {
            unlink(public_path('uploads/' . $sponsor->featured_photo));
        }

        $sponsor->delete();

        return redirect()->route('admin_sponsor_index')
            ->with('success', 'Sponsor deleted successfully!');
    }
}
