<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomeBanner;
use Illuminate\Http\Request;

class AdminHomeBannerController extends Controller
{
    public function index()
    {
        $homeBanner = HomeBanner::first(); // Get the first home banner record
        return view('admin.home_banner.index', compact('homeBanner'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'heading' => 'required|string|max:255',
            'subheading' => 'nullable|string|max:255',
            'text' => 'nullable|string',
            'background' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240', // 10MB max
            'event_date' => 'required|date',
            'event_time' => 'required',
            'button_text' => 'nullable|string|max:255',
            'button_url' => 'nullable|string|max:255',
        ]);

        $homeBanner = HomeBanner::first();

        if (!$homeBanner) {
            $homeBanner = new HomeBanner();
        }

        $homeBanner->heading = $request->heading;
        $homeBanner->subheading = $request->subheading;
        $homeBanner->text = $request->text;
        $homeBanner->event_date = $request->event_date;
        $homeBanner->event_time = $request->event_time;
        $homeBanner->button_text = $request->button_text;
        $homeBanner->button_url = $request->button_url;
        $homeBanner->status = 1;
        $homeBanner->order = 1;

        // Handle background image upload
        if ($request->hasFile('background')) {
            $file = $request->file('background');
            $filename = 'banner_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $filename);
            $homeBanner->background = 'uploads/' . $filename;
        }

        $homeBanner->save();

        return redirect()->back()->with('success', 'Home banner updated successfully!');
    }
}
