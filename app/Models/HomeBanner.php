<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeBanner extends Model
{
    use HasFactory;

    protected $fillable = [
        'heading',
        'subheading',
        'text',
        'background',
        'event_date',
        'event_time',
        'button_text',
        'button_url',
        'order',
        'status'
    ];

    protected $casts = [
        'event_date' => 'date',
        'status' => 'boolean'
    ];

    // Scope for active banners
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    // Scope for ordered banners
    public function scopeOrdered($query)
    {
        return $query->orderBy('order', 'asc');
    }

    // Get formatted event date and time
    public function getFormattedEventDateAttribute()
    {
        return $this->event_date ? $this->event_date->format('F j, Y') : '';
    }

    public function getFormattedEventTimeAttribute()
    {
        return $this->event_time ? date('H:i', strtotime($this->event_time)) : '';
    }

    // Get countdown date in JavaScript format
    public function getCountdownDateAttribute()
    {
        if ($this->event_date && $this->event_time) {
            return $this->event_date->format('m/d/Y') . ' ' . date('H:i:s', strtotime($this->event_time));
        }
        return '';
    }
}
