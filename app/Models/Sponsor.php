<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Sponsor extends Model
{
    protected $fillable = [
        'sponsor_category_id',
        'name',
        'slug',
        'tagline',
        'description',
        'logo',
        'featured_photo',
        'address',
        'email',
        'phone',
        'website',
        'facebook',
        'twitter',
        'linkedin',
        'instagram',
        'map'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the sponsor category that owns the sponsor.
     */
    public function sponsorCategory(): BelongsTo
    {
        return $this->belongsTo(SponsorCategory::class);
    }
}
