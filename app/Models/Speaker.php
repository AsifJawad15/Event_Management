<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Speaker extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'email',
        'phone',
        'photo',
        'designation',
        'biography',
        'address',
        'website',
        'facebook',
        'twitter',
        'linkedin',
        'instagram'
    ];
}
