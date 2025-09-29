<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'package_id',
        'payment_id',
        'package_name',
        'billing_name',
        'billing_email',
        'billing_phone',
        'billing_address',
        'billing_country',
        'billing_state',
        'billing_city',
        'billing_zip',
        'billing_note',
        'payment_method',
        'payment_currency',
        'payment_status',
        'transaction_id',
        'bank_transaction_info',
        'per_ticket_price',
        'total_tickets',
        'total_price'
    ];

    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
