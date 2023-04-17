<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class EpisodeUserPlaylist extends Pivot
{
    use HasFactory;

    protected $table = 'episode_user_playlists';

    protected $fillable = [
        'episode_id',
        'user_id',
    ];
}
