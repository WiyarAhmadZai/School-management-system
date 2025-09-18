<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'name',
        'code',
        'description',
        'teacher_id',
        'class',
        'department',
        'credits',
        'status',
    ];

    protected $casts = [
        'credits' => 'integer',
    ];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function grades()
    {
        return $this->hasMany(Grade::class);
    }
}