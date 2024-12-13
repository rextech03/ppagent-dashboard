<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'reference',
        'room_id',
        'tenant_id',
        'amount',
        'email',
        'purpose',
        'phone',
        'purpose_period',
        'payment_status',
        'confirmed_status',
        'status',
    ];
}
