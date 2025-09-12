<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomeCounter;
use Illuminate\Http\Request;

class AdminHomeCounterController extends Controller
{
    public function index()
    {
        $homeCounter = HomeCounter::first();
        return view('admin.home_counter.index', compact('homeCounter'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'item1_icon' => 'required|string',
            'item1_number' => 'required|integer',
            'item1_title' => 'required|string',
            'item2_icon' => 'required|string',
            'item2_number' => 'required|integer',
            'item2_title' => 'required|string',
            'item3_icon' => 'required|string',
            'item3_number' => 'required|integer',
            'item3_title' => 'required|string',
            'item4_icon' => 'required|string',
            'item4_number' => 'required|integer',
            'item4_title' => 'required|string',
            'status' => 'required|in:show,hide',
            'background' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240'
        ]);

        $homeCounter = HomeCounter::findOrFail($id);

        // Handle background image upload
        if ($request->hasFile('background')) {
            // Delete old background if it exists and is not the default
            if ($homeCounter->background && $homeCounter->background !== 'dist-front/images/counter-bg.jpg' && file_exists(public_path($homeCounter->background))) {
                unlink(public_path($homeCounter->background));
            }

            $file = $request->file('background');
            $filename = 'counter_bg_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/'), $filename);
            $request->merge(['background' => 'uploads/' . $filename]);
        }

        $homeCounter->update($request->all());

        return redirect()->back()->with('success', 'Home counter updated successfully!');
    }
}
