<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;

class AdminVideoController extends Controller
{
    /**
     * Display a listing of videos with pagination
     */
    public function index()
    {
        $videos = Video::orderBy('id', 'desc')->paginate(6);
        return view('admin.video_gallery.index', compact('videos'));
    }

    /**
     * Show the form for creating a new video
     */
    public function create()
    {
        return view('admin.video_gallery.create');
    }

    /**
     * Store a newly created video in storage
     */
    public function store(Request $request)
    {
        $request->validate([
            'caption' => 'required|string|max:255',
            'video' => 'required|string'
        ]);

        // Extract YouTube video ID from various URL formats
        $videoId = $this->extractYouTubeId($request->video);

        if (!$videoId) {
            return back()->withErrors(['video' => 'Please provide a valid YouTube URL or video ID']);
        }

        Video::create([
            'caption' => $request->caption,
            'video' => $videoId
        ]);

        return redirect()->route('admin_video_index')->with('success', 'Video added successfully');
    }

    /**
     * Display the specified video
     */
    public function show(Video $video)
    {
        return view('admin.video_gallery.show', compact('video'));
    }

    /**
     * Show the form for editing the specified video
     */
    public function edit(Video $video)
    {
        return view('admin.video_gallery.edit', compact('video'));
    }

    /**
     * Update the specified video in storage
     */
    public function update(Request $request, Video $video)
    {
        $request->validate([
            'caption' => 'required|string|max:255',
            'video' => 'required|string'
        ]);

        // Extract YouTube video ID from various URL formats
        $videoId = $this->extractYouTubeId($request->video);

        if (!$videoId) {
            return back()->withErrors(['video' => 'Please provide a valid YouTube URL or video ID']);
        }

        $video->update([
            'caption' => $request->caption,
            'video' => $videoId
        ]);

        return redirect()->route('admin_video_index')->with('success', 'Video updated successfully');
    }

    /**
     * Remove the specified video from storage
     */
    public function destroy(Video $video)
    {
        $video->delete();
        return redirect()->route('admin_video_index')->with('success', 'Video deleted successfully');
    }

    /**
     * Extract YouTube video ID from various URL formats
     */
    private function extractYouTubeId($input)
    {
        // If it's already just the ID (11 characters)
        if (preg_match('/^[a-zA-Z0-9_-]{11}$/', $input)) {
            return $input;
        }

        // Extract from various YouTube URL formats
        $patterns = [
            '/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/ ]{11})/',
            '/^.*((youtu.be\/)|(v\/)|(\/u\/\w\/)|(embed\/)|(watch\?))\??v?=?([^#\&\?]*).*/',
            '/youtube\.com.*(\?v=|&v=|\?vi=)([^&\n]*)/',
        ];

        foreach ($patterns as $pattern) {
            if (preg_match($pattern, $input, $matches)) {
                return isset($matches[1]) ? $matches[1] : (isset($matches[7]) ? $matches[7] : null);
            }
        }

        return null;
    }
}
