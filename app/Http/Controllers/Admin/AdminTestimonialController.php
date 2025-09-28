<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminTestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::orderBy('id', 'desc')->paginate(10);
        return view('admin.testimonial.index', compact('testimonials'));
    }    public function create()
    {
        return view('admin.testimonial.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'comment' => 'required|string',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = $request->only(['name', 'designation', 'comment']);

        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $imageName = time() . '_' . Str::random(10) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads'), $imageName);
            $data['photo'] = $imageName;
        }

        Testimonial::create($data);

        return redirect()->route('admin_testimonial_index')->with('success', 'Testimonial created successfully!');
    }

    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonial.edit', compact('testimonial'));
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'comment' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = $request->only(['name', 'designation', 'comment']);

        if ($request->hasFile('photo')) {
            // Delete old photo
            if ($testimonial->photo && file_exists(public_path('uploads/' . $testimonial->photo))) {
                unlink(public_path('uploads/' . $testimonial->photo));
            }

            $image = $request->file('photo');
            $imageName = time() . '_' . Str::random(10) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads'), $imageName);
            $data['photo'] = $imageName;
        }

        $testimonial->update($data);

        return redirect()->route('admin_testimonial_index')->with('success', 'Testimonial updated successfully!');
    }

    public function destroy(Testimonial $testimonial)
    {
        // Delete photo file
        if ($testimonial->photo && file_exists(public_path('uploads/' . $testimonial->photo))) {
            unlink(public_path('uploads/' . $testimonial->photo));
        }

        $testimonial->delete();

        return redirect()->route('admin_testimonial_index')->with('success', 'Testimonial deleted successfully!');
    }
}
