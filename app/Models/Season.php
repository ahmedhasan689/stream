<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Season extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'image',
        'describe',
        'trailer',
        'evaluation',
        'number',
        'status',
        'release_year',
        'viewer',
        'serial_id',
    ];
    protected $casts = [

        'release_year' => 'date',
    ];
    /**
     * ! Relations
     * ? With Serial ( One Serial Have Many Season )
     * ? With Episode ( Many Episode Belong To This Season )
     */

    /**
     * ? Serial Relation
     * @return BelongsTo
     */
    public function serial(): BelongsTo
    {
        return $this->belongsTo(Serial::class, 'serial_id');
    }

    /**
     * ? Episode Relation
     * @return HasMany
     */
    public function episodes(): HasMany
    {
        return $this->hasMany(Episode::class, 'season_id');
    }

}
