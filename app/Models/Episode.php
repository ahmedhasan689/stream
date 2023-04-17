<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Episode extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'image',
        'trailer',
        'describe',
        'video',
        'link',
        'episode_number',
        'hour',
        'minute',
        'release_year',
        'quality',
        'viewer',
        'evaluation',
        'status',
        'season_id',
    ];

    protected $casts = [
        'release_year' => 'date',
    ];

    /**
     * ? Observe To Make Slug Within Creating
     */
    protected static function booted()
    {
        static::creating(function ($episode) {
            $episode->slug = Str::slug($episode->name);
        });
    }

    /**
     * ! Relations
     * ? With Season ( One Season Have Many Episode )
     * ? With User ( Belongs To Many User - Using SerialUser Model)
     * ? With User View ( Belongs To Many User - Using EpisodeUser Model )
     * ? With Tags ( Polymorph Relation Many To Many )
     */

    /**
     * ? Season Relation
     * @return BelongsTo
     */
    public function season(): BelongsTo
    {
        return $this->belongsTo(Season::class, 'season_id');
    }

    /**
     * ? User Relations
     * @return BelongsToMany
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'episode_user_likes', 'episode_id', 'user_id')
             ->using(EpisodeUser::class)
            // ->withPivot(['like'])
             ->as('episode_like');
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
     * ? Playlist Relation
     * @return BelongsToMany
     */
    public function user_episode_playlists(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'episode_user_playlists', 'episode_id', 'user_id')
            ->using(EpisodeUserPlaylist::class)
            ->as('episodeUserPlaylists');
    }

    /**
     * ? User View Relation
     * @return BelongsToMany
     */
    public function user_views(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'episode_views', 'episode_id', 'user_id')
            ->using(EpisodeView::class)
            ->as('episode_views');
    }

}
