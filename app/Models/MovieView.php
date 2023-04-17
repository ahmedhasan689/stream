<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class MovieView extends Pivot
{
    use HasFactory;

    protected $table = 'movie_views';

    public $incrementing = true;

    /**
     * ! Relations
     * ? With Movie ( Movie Have Many Movie )
     * ? With User ( Actor Have Many User )
     */

}
