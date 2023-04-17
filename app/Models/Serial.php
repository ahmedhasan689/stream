<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Serial extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'describe',
        'image',
        'release_year',
        'trailer',
        'age_group',
        'evaluation',
        'status',
        'viewer',
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'release_year' => 'date',
    ];

    /**
     * ? Observe To Make Slug Within Creating
     */
    protected static function booted()
    {
        static::creating(function ($serial) {
            $serial->slug = Str::slug($serial->name);
        });
    }
    /**
     * ! Relations
     * ? With Season ( Many Season Belong To This Serial )
     * ? With Actor ( Belongs To Many Actor - Using SerialActor Model)
     * ? With Category ( Belongs To Many Actor - Using SerialCategory Model)
     * ? With User ( Belongs To Many User - Using SerialUser Model)
     */

    /**
     * ? Season Relation
     * @return HasMany
     */
    public function seasons(): HasMany
    {
        return $this->hasMany(Season::class);
    }

    /**
     * ? Actors Relations
     * @return BelongsToMany
     */
    public function actors(): BelongsToMany
    {
        return $this->belongsToMany(Actor::class, 'serial_actors', 'serial_id', 'actor_id')
             ->using(SerialActor::class);
            // ->withPivot(['*']);
    }

    /**
     * ? Category Relations
     * @return BelongsToMany
     */
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'serial_categories', 'serial_id', 'category_id')
             ->using(SerialCategory::class);
            // ->withPivot(['*']);
    }


}
