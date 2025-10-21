<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ScheduleDay;
use App\Models\Schedule;
use Illuminate\Http\Request;

class AdminScheduleDayController extends Controller
{
    public function index()
    {
        $scheduleDays = ScheduleDay::orderBy('id')->get();
        return view('admin.schedule_day.index', compact('scheduleDays'));
    }

    public function create()
    {
        return view('admin.schedule_day.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'day' => 'required|string|max:255',
            'date1' => 'required|date',
            'order1' => 'required|integer'
        ]);

        ScheduleDay::create($request->all());

        return redirect()->route('admin_schedule_day_index')->with('success', 'Schedule Day created successfully!');
    }

    public function edit($id)
    {
        $schedule_day = ScheduleDay::findOrFail($id);
        return view('admin.schedule_day.edit', compact('schedule_day'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'day' => 'required|string|max:255',
            'date1' => 'required|date',
            'order1' => 'required|integer'
        ]);

        $schedule_day = ScheduleDay::findOrFail($id);
        $schedule_day->update($request->all());

        return redirect()->route('admin_schedule_day_index')->with('success', 'Schedule Day updated successfully!');
    }

    public function destroy($id)
    {
        $schedule_day = ScheduleDay::findOrFail($id);

        // Check if schedule day has schedules
        if ($schedule_day->schedules()->count() > 0) {
            return redirect()->route('admin_schedule_day_index')->with('error', 'Cannot delete schedule day! It has schedules associated with it.');
        }

        $schedule_day->delete();

        return redirect()->route('admin_schedule_day_index')->with('success', 'Schedule Day deleted successfully!');
    }
}
