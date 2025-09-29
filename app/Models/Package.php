<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'maximum_tickets',
        'item_order',
    ];

    public function facilities()
    {
        return $this->belongsToMany(PackageFacility::class)->orderBy('item_order');
    }

    public function scopeOrderByItemOrder($query)
    {
        return $query->orderBy('item_order');
    }
}
