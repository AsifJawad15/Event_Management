<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Speaker;
use App\Models\Schedule;
use Illuminate\Support\Facades\DB;

class AdminScheduleSpeakerController extends Controller
{
    public function index()
    {
        $speakers = Speaker::orderBy('name', 'asc')->get();
        $schedules = Schedule::with('scheduleDay')->orderBy('id', 'asc')->get();

        // Get pivot table data with joins
        $pivot_table_data = DB::table('schedule_speaker')
            ->join('speakers', 'schedule_speaker.speaker_id', '=', 'speakers.id')
            ->join('schedules', 'schedule_speaker.schedule_id', '=', 'schedules.id')
            ->join('schedule_days', 'schedules.schedule_day_id', '=', 'schedule_days.id')
            ->select(
                'schedule_speaker.id as pivot_id',
                'speakers.name as speaker_name',
                'speakers.email as speaker_email',
                'schedules.title as schedule_title',
                'schedule_days.day',
                'schedule_days.date1'
            )
            ->get();

        return view('admin.speaker_schedule.index', compact('speakers', 'schedules', 'pivot_table_data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'speaker_id' => 'required|exists:speakers,id',
            'schedule_id' => 'required|exists:schedules,id'
        ]);

        // Check if this assignment already exists
        $exists = DB::table('schedule_speaker')
            ->where('speaker_id', $request->speaker_id)
            ->where('schedule_id', $request->schedule_id)
            ->exists();

        if ($exists) {
            return back()->with('error', 'This speaker is already assigned to this schedule!');
        }

        // Attach speaker to schedule
        $speaker = Speaker::find($request->speaker_id);
        $speaker->schedules()->attach($request->schedule_id);

        return back()->with('success', 'Speaker added to schedule successfully!');
    }

    public function delete($id)
    {
        DB::table('schedule_speaker')->where('id', $id)->delete();
        return back()->with('success', 'Speaker schedule assignment deleted successfully!');
    }
}
