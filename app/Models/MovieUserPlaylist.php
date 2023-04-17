<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class MovieUserPlaylist extends Pivot
{
    use HasFactory;

    protected $table = 'movie_user_playlists';

    protected $fillable = [
        'movie_id',
        'user_id',
    ];
}
