<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class EpisodeUser extends Pivot
{
    use HasFactory;

    protected $table = 'episode_user_likes';


}
