<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Actor extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'describe',
        'image',
        'status',
    ];

    /**
     * ! Relations
     * ? With Movie ( Belongs To Many Movie - Using MovieActor Model)
     * ? With Serial ( Belongs To Many Serial - Using SerialActor Model)
     */

    /**
     * ? Movie Relations
     * @return BelongsToMany
     */
    public function movies(): BelongsToMany
    {
        return $this->belongsToMany(Movie::class, 'movie_actors', 'actor_id', 'movie_id')
             ->using(MovieActor::class);
            // ->withPivot(['*']);
    }

    /**
     * ? Serial Relations
     * @return BelongsToMany
     */
    public function serials(): BelongsToMany
    {
        return $this->belongsToMany(Serial::class, 'serial_actors', 'actor_id', 'serial_id')
             ->using(SerialActor::class);
    }
}
