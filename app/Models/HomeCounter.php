<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeCounter extends Model
{
    protected $fillable = [
        'item1_icon',
        'item1_number',
        'item1_title',
        'item2_icon',
        'item2_number',
        'item2_title',
        'item3_icon',
        'item3_number',
        'item3_title',
        'item4_icon',
        'item4_number',
        'item4_title',
        'status'
    ];
}
