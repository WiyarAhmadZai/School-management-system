<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Post extends Model
{
    protected $fillable = [
        'title',
        'content',
        'image',
        'user_id',
        'likes',
        'shares'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getTimeAgoAttribute()
    {
        return Carbon::parse($this->created_at)->diffForHumans();
    }
}
