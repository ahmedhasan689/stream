<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subscription extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'billable_id',
        'billable_type',
        'name',
        'paddle_id',
        'paddle_status',
        'paddle_plan',
        'quantity',
        'trial_ends_at',
        'paused_from',
        'ends_at',
    ];
}
