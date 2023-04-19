<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Receipt extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'billable_id',
        'billable_type',
        'paddle_subscription_id',
        'checkout_id',
        'order_id',
        'amount',
        'tax',
        'currency',
        'quantity',
        'receipt_url',
        'paid_at',
    ];
}
