<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class Post extends Model
{
    protected $fillable = [
        'title',
        'content',
        'image',
        'user_id',
        'likes',
        'shares',
        'views'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getTimeAgoAttribute()
    {
        return Carbon::parse($this->created_at)->diffForHumans();
    }

    // Method to increment view count
    public function incrementViewCount()
    {
        $this->views++;
        $this->save();
    }

    // Method to check if current user has liked the post
    public function isLikedByUser()
    {
        // For simplicity, we'll use session to track likes per user
        // In a real application, you would have a separate likes table
        $likedPosts = session('liked_posts', []);
        return in_array($this->id, $likedPosts);
    }
}
