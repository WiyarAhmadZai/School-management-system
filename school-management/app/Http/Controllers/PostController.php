<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Like;
use App\Models\User;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Course;
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
        // Get statistics for the homepage
        $totalStudents = Student::count();
        $totalTeachers = Teacher::count();
        $totalCourses = Course::count();
        $totalPosts = Post::count();

        // Show only top 4 posts for homepage
        $posts = Post::with('user')->orderBy('created_at', 'desc')->take(4)->get();

        // Get all users for the user directory, excluding guests and ordering by name
        $users = User::where('id', '!=', Auth::id())->orderBy('name')->get();

        // Get recent activities
        $recentStudents = Student::latest()->take(3)->get();
        $recentTeachers = Teacher::latest()->take(3)->get();
        $recentPosts = Post::with('user')->latest()->take(3)->get();

        return view('welcome', compact(
            'totalStudents',
            'totalTeachers',
            'totalCourses',
            'totalPosts',
            'posts',
            'users',
            'recentStudents',
            'recentTeachers',
            'recentPosts'
        ));
    }

    public function show(Post $post)
    {
        // Increment view count when post is viewed
        $post->incrementViewCount();

        // Load likes with user information for admin view
        $post->load('likedByUsers');

        return view('posts.show', compact('post'));
    }

    public function like(Post $post, Request $request)
    {
        // Check if user is authenticated
        if (!Auth::check()) {
            if ($request->ajax()) {
                return response()->json(['error' => 'You must be logged in to like a post.'], 401);
            }
            return redirect()->route('login');
        }

        // Check if user has already liked this post
        $existingLike = Like::where('user_id', Auth::id())->where('post_id', $post->id)->first();

        if ($existingLike) {
            // User has already liked, so unlike it
            $existingLike->delete();

            // Return JSON response for AJAX
            if ($request->ajax()) {
                return response()->json([
                    'status' => 'unliked',
                    'likes' => $post->likes()->count(),
                    'message' => 'Post unliked!'
                ]);
            }

            return back()->with('success', 'Post unliked!');
        } else {
            // User hasn't liked yet, so like it
            Like::create([
                'user_id' => Auth::id(),
                'post_id' => $post->id
            ]);

            // Return JSON response for AJAX
            if ($request->ajax()) {
                return response()->json([
                    'status' => 'liked',
                    'likes' => $post->likes()->count(),
                    'message' => 'Post liked!'
                ]);
            }

            return back()->with('success', 'Post liked!');
        }
    }

    public function share(Post $post)
    {
        $post->increment('shares');
        return back()->with('success', 'Post shared!');
    }

    // Show users who liked a post (admin functionality)
    public function showLikes(Post $post)
    {
        // Check if user is admin or the post owner
        if (!Auth::check() || (!Auth::user()->is_admin && Auth::id() != $post->user_id)) {
            return response()->json(['error' => 'Unauthorized access.'], 403);
        }

        $likedUsers = $post->likedByUsers()->get();

        // Return JSON response for AJAX modal
        return response()->json([
            'post' => $post,
            'likedUsers' => $likedUsers
        ]);
    }
}
