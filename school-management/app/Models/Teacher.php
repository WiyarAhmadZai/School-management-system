<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'subject',
        'department',
        'qualification',
        'date_of_birth',
        'address',
        'salary',
        'status',
    ];

    protected $casts = [
        'date_of_birth' => 'date',
        'salary' => 'decimal:2',
    ];

    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}
