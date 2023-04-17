<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Blog extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'short_description',
        'long_description',
        'cover_image',
        'user_id',
        'category_id',
    ];


    /**
     * ? Observe To Make Slug Within Creating
     */
    protected static function booted()
    {
        static::creating(function ($blog) {
            $blog->slug = Str::slug($blog->title);
        });
    }

    /**
     * ! Relations
     * ? With Tags ( Polymorph Relation Many To Many )
     * ? With User ( Many Blogs Belong To One User )
     * ? With Category ( Many Blogs Belong To One Category )
     */

    /**
     * ? Tags Relation
     * ? Get all the tags for the blog.
     */
    public function tags(): morphToMany
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    /**
     * ? User Relation
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * ? Category Relation
     * @return BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
