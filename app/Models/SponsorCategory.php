<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SponsorCategory extends Model
{
    protected $fillable = [
        'name',
        'description'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the sponsors for the sponsor category.
     */
    public function sponsors(): HasMany
    {
        return $this->hasMany(Sponsor::class);
    }
}
