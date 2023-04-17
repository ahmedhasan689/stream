<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'type',
        'status',
        'image',
        'describe',
        'evaluation',
        'viewer',

    ];

    /**
     * ? Observe To Make Slug Within Creating
     */
    protected static function booted()
    {
        static::creating(function ($category) {
            $category->slug = Str::slug($category->name);
        });
    }

    /**
     * ! Relations Will Be Here Soon
     * ? With Serial ( Belongs To Many Serial - Using SerialCategory Model)
     * ? With User ( Belongs To Many User - Using CategoryUser Model)
     * ? With Category ( Belongs To Many Category - Using CategoryMovie Model)
     */

    /**
     * ? Serial Relations
     * @return BelongsToMany
     */
    public function serials(): BelongsToMany
    {
        return $this->belongsToMany(Serial::class, 'serial_categories', 'category_id', 'serial_id')
             ->using(SerialCategory::class);
            // ->withPivot(['*']);
    }

    /**
     * ? User Relations
     * @return BelongsToMany
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'show_category_users', 'category_id', 'user_id')
             ->using(CategoryUser::class)
            // ->withPivot(['*'])
             ->as('show_category');
    }

    /**
     * ? Movie Relation
     * @return BelongsToMany
     */
    public function movies(): BelongsToMany
    {
        return $this->belongsToMany(Movie::class, 'category_movies', 'category_id', 'movie_id')
            ->using(CategoryMovie::class)
            // ->withPivot(['like'])
            ->as('category_movie');
    }


}
