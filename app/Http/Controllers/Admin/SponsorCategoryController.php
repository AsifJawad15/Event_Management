<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SponsorCategory;
use Illuminate\Http\Request;

class SponsorCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sponsorCategories = SponsorCategory::orderBy('created_at', 'desc')->get();
        return view('admin.sponsor_categories.index', compact('sponsorCategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.sponsor_categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:sponsor_categories,name',
            'description' => 'nullable|string|max:1000'
        ]);

        SponsorCategory::create([
            'name' => $request->name,
            'description' => $request->description
        ]);

        return redirect()->route('admin.sponsor_categories.index')
            ->with('success', 'Sponsor category created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(SponsorCategory $sponsorCategory)
    {
        return view('admin.sponsor_categories.show', compact('sponsorCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SponsorCategory $sponsorCategory)
    {
        return view('admin.sponsor_categories.edit', compact('sponsorCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SponsorCategory $sponsorCategory)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:sponsor_categories,name,' . $sponsorCategory->id,
            'description' => 'nullable|string|max:1000'
        ]);

        $sponsorCategory->update([
            'name' => $request->name,
            'description' => $request->description
        ]);

        return redirect()->route('admin.sponsor_categories.index')
            ->with('success', 'Sponsor category updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SponsorCategory $sponsorCategory)
    {
        $sponsorCategory->delete();

        return redirect()->route('admin.sponsor_categories.index')
            ->with('success', 'Sponsor category deleted successfully!');
    }
}
