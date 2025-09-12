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
            'status' => 'required|in:show,hide'
        ]);

        $homeCounter = HomeCounter::findOrFail($id);
        $homeCounter->update($request->all());

        return redirect()->back()->with('success', 'Home counter updated successfully!');
    }
}
