<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Movie extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'describe',
        'hour',
        'minute',
        'image',
        'release_year',
        'quality',
        'video',
        'link',
        'evaluation',
        'trailer',
        'viewer',
        'age_group',
        'category_id',
        'status',
    ];

    protected $casts = [
        'release_year' => 'date',
    ];

    /**
     * ? Observe To Make Slug Within Creating
     */
    protected static function booted()
    {
        static::creating(function ($movie) {
            $movie->slug = Str::slug($movie->name);
        });
    }

    /**
     * ! Relations
     * ? With Actor ( Belongs To Many Movie - Using MovieActor Model)
     * ? With User ( Belongs To Many User - Using MovieUser Model)
     * ? With Movie View ( Belongs To Many User - Using MovieView  Model)
     * ? With Tag ( Polymorph Relation Many To Many )
     * ? With Category ( One Movie Has Many Categories )
     * ? With Playlist ( One Movie Has Many Categories )
     */

    /**
     * ? Movie Relations
     * @return BelongsToMany
     */
    public function actors(): BelongsToMany
    {
        return $this->belongsToMany(Actor::class, 'movie_actors', 'movie_id', 'actor_id')
             ->using(MovieActor::class);
            // ->withPivot(['*']);
    }

    /**
     * ? User Relations
     * @return BelongsToMany
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'movie_user_likes', 'movie_id', 'user_id')
             ->using(MovieUser::class)
            // ->withPivot(['like'])
             ->as('movie_like');
    }

    /**
     * ? Tags Relation
     * ? Get all the tags for the blog.
     */
    public function tags(): morphToMany
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    /**
     * ? Category Relation
     * @return BelongsToMany
     */
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'category_movies', 'movie_id', 'category_id')
            ->using(CategoryMovie::class)
            ->as('category_movie');
    }

    /**
     * ? Playlist Relation
     * @return BelongsToMany
     */
    public function user_movie_playlists(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'movie_user_playlists', 'movie_id', 'user_id')
            ->using(MovieUserPlaylist::class)
            ->as('movieUserPlaylists');
    }

    /**
     * ? User Views Relation
     * @return BelongsToMany
     */
    public function user_views(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'movie_views', 'movie_id', 'user_id')
            ->using(MovieView::class)
            ->as('movie_views');
    }

    /**
     * ? User Points Relation
     * @return BelongsToMany
     */
    public function user_points(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'movie_points', 'movie_id', 'user_id')
            ->using(MoviePoint::class)
            ->as('movie_points');
    }

    public function scopeTableFilters($query)
    {
        return $query->when(request()->input('name', false), function ($query, $name) {
            return $query->where('name', 'like', '%' . $name . '%');
        });
    }
}
