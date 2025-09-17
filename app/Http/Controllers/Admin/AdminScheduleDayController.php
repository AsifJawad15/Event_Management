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
        $scheduleDay = ScheduleDay::findOrFail($id);
        return view('admin.schedule_day.edit', compact('scheduleDay'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'day' => 'required|string|max:255',
            'date1' => 'required|date',
            'order1' => 'required|integer'
        ]);

        $scheduleDay = ScheduleDay::findOrFail($id);
        $scheduleDay->update($request->all());

        return redirect()->route('admin_schedule_day_index')->with('success', 'Schedule Day updated successfully!');
    }

    public function destroy($id)
    {
        $scheduleDay = ScheduleDay::findOrFail($id);

        // Check if schedule day has schedules
        if ($scheduleDay->schedules()->count() > 0) {
            return redirect()->route('admin_schedule_day_index')->with('error', 'Cannot delete schedule day! It has schedules associated with it.');
        }

        $scheduleDay->delete();

        return redirect()->route('admin_schedule_day_index')->with('success', 'Schedule Day deleted successfully!');
    }
}
