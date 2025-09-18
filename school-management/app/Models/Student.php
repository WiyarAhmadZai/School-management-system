<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'date_of_birth',
        'address',
        'class',
        'section',
        'parent_name',
        'parent_phone',
        'status',
    ];

    protected $casts = [
        'date_of_birth' => 'date',
    ];

    public function grades()
    {
        return $this->hasMany(Grade::class);
    }
}
