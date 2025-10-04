<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'logo',
        'favicon',
        'banner',
        'ticket_purchase_expire_date',
        'theme_color',
        'copyright',
        'footer_address',
        'footer_email',
        'footer_phone',
        'footer_facebook',
        'footer_twitter',
        'footer_linkedin',
        'footer_instagram',
    ];
}
