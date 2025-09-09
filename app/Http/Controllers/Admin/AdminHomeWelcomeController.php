<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomeWelcome;
use Illuminate\Http\Request;

class AdminHomeWelcomeController extends Controller
{
    public function index()
    {
        $homeWelcome = HomeWelcome::first(); // Get the first home welcome record
        return view('admin.home_welcome.index', compact('homeWelcome'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'heading' => 'required|string|max:255',
            'description' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240', // 10MB max
            'button_text' => 'nullable|string|max:255',
            'button_link' => 'nullable|string|max:255',
            'status' => 'required|string|in:active,inactive'
        ]);

        $homeWelcome = HomeWelcome::first();

        if (!$homeWelcome) {
            $homeWelcome = new HomeWelcome();
        }

        $homeWelcome->heading = $request->heading;
        $homeWelcome->description = $request->description;
        $homeWelcome->button_text = $request->button_text;
        $homeWelcome->button_link = $request->button_link;
        $homeWelcome->status = $request->status;

        // Handle photo upload
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = 'welcome_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $filename);
            $homeWelcome->photo = 'uploads/' . $filename;
        }

        $homeWelcome->save();

        return redirect()->back()->with('success', 'Home welcome section updated successfully!');
    }
}
