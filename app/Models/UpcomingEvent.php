<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UpcomingEvent extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image',
        'event_date',
        'status',
        'order'
    ];

    protected $casts = [
        'event_date' => 'date',
    ];

    /**
     * Scope to get only active events
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    /**
     * Scope to order events by order field and date
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('order', 'asc')->orderBy('event_date', 'asc');
    }

    /**
     * Get the image URL attribute
     */
    public function getImageUrlAttribute()
    {
        return $this->image ? asset('uploads/' . $this->image) : asset('uploads/default.jpg');
    }

    /**
     * Get formatted event date
     */
    public function getFormattedDateAttribute()
    {
        return $this->event_date->format('M d, Y');
    }
}
