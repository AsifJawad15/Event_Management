<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Event extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'location',
        'venue',
        'start_date',
        'end_date',
        'start_time',
        'end_time',
        'banner_image',
        'thumbnail_image',
        'status',
        'is_featured',
        'max_attendees',
        'price',
        'tags',
        'organizer_name',
        'organizer_email',
        'organizer_phone',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'is_featured' => 'boolean',
        'price' => 'decimal:2',
    ];

    // Auto-generate slug from name
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($event) {
            if (empty($event->slug)) {
                $event->slug = Str::slug($event->name);
            }
        });
    }

    // Scope for published events
    public function scopePublished($query)
    {
        return $query->where('status', 'Published');
    }

    // Scope for featured events
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    // Scope for upcoming events
    public function scopeUpcoming($query)
    {
        return $query->where('start_date', '>=', now()->toDateString());
    }

    // Check if event is upcoming
    public function isUpcoming()
    {
        return $this->start_date >= now()->toDateString();
    }

    // Check if event is ongoing
    public function isOngoing()
    {
        return $this->start_date <= now()->toDateString() && $this->end_date >= now()->toDateString();
    }

    // Check if event is completed
    public function isCompleted()
    {
        return $this->end_date < now()->toDateString();
    }

    // Get formatted date range
    public function getDateRangeAttribute()
    {
        if ($this->start_date->eq($this->end_date)) {
            return $this->start_date->format('F j, Y');
        }
        return $this->start_date->format('F j, Y') . ' - ' . $this->end_date->format('F j, Y');
    }
}
