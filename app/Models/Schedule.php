<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = [
        'schedule_day_id',
        'title',
        'description',
        'location',
        'time',
        'photo',
        'item_order1'
    ];

    public function scheduleDay()
    {
        return $this->belongsTo(ScheduleDay::class);
    }
}
