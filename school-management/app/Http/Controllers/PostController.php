<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        // Show all posts with pagination (8 per page)
        $posts = Post::with('user')->orderBy('created_at', 'desc')->paginate(8);
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $post = new Post();
        $post->title = $request->title;
        $post->content = $request->content;
        $post->user_id = Auth::id();

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('posts', 'public');
            $post->image = $imagePath;
        }

        $post->save();

        return redirect()->route('posts.index')->with('success', 'Post created successfully!');
    }

    public function showHomepagePosts()
    {
        // Show only top 4 posts for homepage
        $posts = Post::with('user')->orderBy('created_at', 'desc')->take(4)->get();
        return view('welcome', compact('posts'));
    }

    public function show(Post $post)
    {
        // Increment view count when post is viewed
        $post->incrementViewCount();

        return view('posts.show', compact('post'));
    }

    public function like(Post $post)
    {
        // Check if user has already liked this post
        $likedPosts = session('liked_posts', []);

        if (!in_array($post->id, $likedPosts)) {
            // Add post to liked posts
            $likedPosts[] = $post->id;
            session(['liked_posts' => $likedPosts]);

            // Increment likes count
            $post->increment('likes');

            return back()->with('success', 'Post liked!');
        }

        return back()->with('error', 'You have already liked this post!');
    }

    public function share(Post $post)
    {
        $post->increment('shares');
        return back()->with('success', 'Post shared!');
    }
}
