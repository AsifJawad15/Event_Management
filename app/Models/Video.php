<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = ['caption', 'video'];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get YouTube thumbnail URL
     */
    public function getThumbnailUrlAttribute()
    {
        return "https://img.youtube.com/vi/{$this->video}/0.jpg";
    }

    /**
     * Get YouTube embed URL
     */
    public function getEmbedUrlAttribute()
    {
        return "https://www.youtube.com/embed/{$this->video}";
    }

    /**
     * Get YouTube watch URL
     */
    public function getWatchUrlAttribute()
    {
        return "https://www.youtube.com/watch?v={$this->video}";
    }
}
