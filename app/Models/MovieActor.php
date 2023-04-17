<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\SoftDeletes;

class MovieActor extends Pivot
{
    use HasFactory, SoftDeletes;

    protected $table = 'movie_actors';
    public $incrementing = true;

    /**
     * ! Relations
     * ? With Movie ( Movie Have Many Actor )
     * ? With Actor ( Actor Have Many Movie )
     */

}
