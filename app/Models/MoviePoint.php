<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\Pivot;

class MoviePoint extends Pivot
{
    use HasFactory;

    protected $table = 'movie_points';

    protected $fillable = [
        'user_id',
        'movie_id',
        'point',
    ];


}
