<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organiser extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'designation',
        'photo',
        'email',
        'phone',
        'biography',
        'address',
        'facebook',
        'instagram',
        'twitter',
        'linkedin'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
