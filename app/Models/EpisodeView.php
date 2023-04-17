<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class EpisodeView extends Pivot
{
    use HasFactory;

    protected $table = 'episode_views';

    public $incrementing = true;

    /**
     * ! Relations
     * ? With Episode ( Episode Have Many User )
     * ? With User ( User Have Many Episode )
     */

}
