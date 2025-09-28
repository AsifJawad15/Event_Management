<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminPostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(10);
        return view('admin.post.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.post.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'short_description' => 'required|string|max:500',
            'description' => 'required|string',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = $request->only(['title', 'short_description', 'description']);
        $data['slug'] = Str::slug($request->title);

        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $imageName = time() . '_' . Str::random(10) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads'), $imageName);
            $data['photo'] = $imageName;
        }

        Post::create($data);

        return redirect()->route('admin_post_index')->with('success', 'Post created successfully!');
    }

    public function edit(Post $post)
    {
        return view('admin.post.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'short_description' => 'required|string|max:500',
            'description' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = $request->only(['title', 'short_description', 'description']);
        $data['slug'] = Str::slug($request->title);

        if ($request->hasFile('photo')) {
            // Delete old photo
            if ($post->photo && file_exists(public_path('uploads/' . $post->photo))) {
                unlink(public_path('uploads/' . $post->photo));
            }

            $image = $request->file('photo');
            $imageName = time() . '_' . Str::random(10) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads'), $imageName);
            $data['photo'] = $imageName;
        }

        $post->update($data);

        return redirect()->route('admin_post_index')->with('success', 'Post updated successfully!');
    }

    public function destroy(Post $post)
    {
        // Delete photo file
        if ($post->photo && file_exists(public_path('uploads/' . $post->photo))) {
            unlink(public_path('uploads/' . $post->photo));
        }

        $post->delete();

        return redirect()->route('admin_post_index')->with('success', 'Post deleted successfully!');
    }
}
