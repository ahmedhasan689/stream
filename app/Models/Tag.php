<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Tag extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
    ];

    /**
     * ? Observe To Make Slug Within Creating
     */
    protected static function booted()
    {
        static::creating(function ($tag) {
            $tag->slug = Str::slug($tag->name);
        });
    }

    /**
     * ! Relations
     * ? With Blog ( Polymorph Relation )
     */

    /**
     * ? Blogs Relations
     * ? Get all the posts that are assigned this tag.
     */
    public function blogs()
    {
        return $this->morphedByMany(Blog::class, 'taggable');
    }


}
