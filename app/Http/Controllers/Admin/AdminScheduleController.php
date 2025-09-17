<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use App\Models\ScheduleDay;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $schedules = Schedule::with('scheduleDay')->orderBy('item_order1', 'asc')->get();
        return view('admin.schedule.index', compact('schedules'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $schedule_days = ScheduleDay::orderBy('order1', 'asc')->get();
        return view('admin.schedule.create', compact('schedule_days'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'schedule_day_id' => 'required|exists:schedule_days,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'time' => 'required|string|max:255',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'item_order1' => 'required|integer'
        ]);

        $schedule = new Schedule();
        $schedule->schedule_day_id = $request->schedule_day_id;
        $schedule->title = $request->title;
        $schedule->description = $request->description;
        $schedule->location = $request->location;
        $schedule->time = $request->time;
        $schedule->item_order1 = $request->item_order1;

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $filename);
            $schedule->photo = $filename;
        }

        $schedule->save();

        return redirect()->route('admin_schedule_index')->with('success', 'Schedule created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $schedule = Schedule::findOrFail($id);
        $schedule_days = ScheduleDay::orderBy('order1', 'asc')->get();
        return view('admin.schedule.edit', compact('schedule', 'schedule_days'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'schedule_day_id' => 'required|exists:schedule_days,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'time' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'item_order1' => 'required|integer'
        ]);

        $schedule = Schedule::findOrFail($id);
        $schedule->schedule_day_id = $request->schedule_day_id;
        $schedule->title = $request->title;
        $schedule->description = $request->description;
        $schedule->location = $request->location;
        $schedule->time = $request->time;
        $schedule->item_order1 = $request->item_order1;

        if ($request->hasFile('photo')) {
            // Delete old photo if exists
            if ($schedule->photo && file_exists(public_path('uploads/' . $schedule->photo))) {
                unlink(public_path('uploads/' . $schedule->photo));
            }

            $file = $request->file('photo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $filename);
            $schedule->photo = $filename;
        }

        $schedule->save();

        return redirect()->route('admin_schedule_index')->with('success', 'Schedule updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $schedule = Schedule::findOrFail($id);

        // Delete photo if exists
        if ($schedule->photo && file_exists(public_path('uploads/' . $schedule->photo))) {
            unlink(public_path('uploads/' . $schedule->photo));
        }

        $schedule->delete();

        return redirect()->route('admin_schedule_index')->with('success', 'Schedule deleted successfully!');
    }
}
