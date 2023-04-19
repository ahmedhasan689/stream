<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EpisodePoint extends Model
{
    use HasFactory;

    protected $table = 'episode_points';

    protected $fillable = [
        'user_id',
        'episode_id',
        'point',
    ];
}
