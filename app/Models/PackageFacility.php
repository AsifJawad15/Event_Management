<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackageFacility extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'status',
        'item_order',
    ];

    public function packages()
    {
        return $this->belongsToMany(Package::class);
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function scopeOrderByItemOrder($query)
    {
        return $query->orderBy('item_order');
    }
}