<?php

namespace App\Models;

 use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'gender',
        'date_of_birth',
        'image',
    ];

    /**
     * ! Relations
     * ? With Category ( Belongs To Many Category - Using CategoryUser Model)
     * ? With Movie ( Belongs To Many Movie - Using MovieUser Model)
     * ? With Movie View ( Belongs To Many Movie - Using MovieView Model)
     * ? With Serial ( Belongs To Many Serial - Using SerialUser Model)
     * ? With Episode ( Belongs To Many Episode - Using EpisodeUser Model)
     * ? With EpisodeView ( Belongs To Many Episode - Using EpisodeView Model)
     */

    /**
     * ? Category Relations
     * @return BelongsToMany
     */
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'show_category_user', 'user_id', 'category_id')
            ->using(CategoryUser::class)
            ->withPivot(['*'])
            ->as('show_category');
    }

    /**
     * ? Movie Relations
     * @return BelongsToMany
     */
    public function movies(): BelongsToMany
    {
        return $this->belongsToMany(Movie::class, 'movie_user_likes', 'user_id', 'movie_id')
            ->using(MovieUser::class)
            ->withPivot(['like'])
            ->as('movie_like');
    }

    /**
     * ? Serial Relations
     * @return BelongsToMany
     */
    public function serials(): BelongsToMany
    {
        return $this->belongsToMany(Serial::class, 'serial_user_likes', 'user_id', 'serial_id')
            ->using(SerialUser::class)
            ->withPivot(['like'])
            ->as('serial_like');
    }

    /**
     * ? Episode Relations
     * @return BelongsToMany
     */
    public function episodes(): BelongsToMany
    {
        return $this->belongsToMany(Episode::class, 'episode_user_likes', 'user_id', 'episode_id')
            ->using(EpisodeUser::class)
            ->withPivot(['like'])
            ->as('episode_like');
    }

    /**
     * ? Movie Playlist Relation
     * @return BelongsToMany
     */
    public function user_movie_playlists(): BelongsToMany
    {
        return $this->belongsToMany(Movie::class, 'movie_user_playlists', 'user_id', 'movie_id')
            ->using(MovieUserPlaylist::class)
            ->as('movieUserPlaylists');
    }

    /**
     * ? Serial Playlist Relation
     * @return BelongsToMany
     */
    public function user_episode_playlists(): BelongsToMany
    {
        return $this->belongsToMany(Episode::class, 'episode_user_playlists', 'user_id', 'episode_id')
            ->using(EpisodeUserPlaylist::class)
            ->as('episodeUserPlaylists');
    }

    /**
     * ? Movie View Relation
     * @return BelongsToMany
     */
    public function movie_views(): BelongsToMany
    {
        return $this->belongsToMany(Movie::class, 'movie_views', 'user_id', 'movie_id')
            ->using(MovieView::class)
            ->as('movie_views');
    }


    /**
     * ? Serial View Relation
     * @return BelongsToMany
     */
    public function episode_views(): BelongsToMany
    {
        return $this->belongsToMany(Episode::class, 'episode_views', 'user_id', 'episode_id')
            ->using(EpisodeView::class)
            ->as('episode_views');
    }
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getAvatarAttribute()
    {
        if( !$this->image ) {
            return asset('front_assets/images/user/user_.png');
        }

        return asset('storage') . '/' . $this->image;
    }
}
