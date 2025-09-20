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

    // Relationship with likes
    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    // Method to check if current user has liked the post
    public function isLikedByUser()
    {
        if (auth()->check()) {
            return $this->likes()->where('user_id', auth()->id())->exists();
        }
        return false;
    }

    // Get all users who liked this post
    public function likedByUsers()
    {
        return $this->belongsToMany(User::class, 'likes', 'post_id', 'user_id');
    }
}