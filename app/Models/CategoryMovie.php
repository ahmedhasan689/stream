<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoryMovie extends Pivot
{
    use HasFactory, SoftDeletes;

    public $table = 'category_movies';

    public $incrementing = true;

    /**
     * ! Relations
     * ? With Movie ( Movie Has Many Categories )
     * ? With Category ( Category Has Many Movies )
     */

    /**
     * ? Movie Relation
     * @return BelongsTo
     */
    public function movie(): BelongsTo
    {
        return $this->belongsTo(Movie::class);
    }

    /**
     * ? Category Relation
     * @return BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
