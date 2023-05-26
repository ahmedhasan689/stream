<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\SoftDeletes;

class SerialCategory extends Pivot
{
    use HasFactory, SoftDeletes;

    protected $table = 'serial_categories';

    public $incrementing = true;

    /**
     * ! Relations
     * ? With Serial ( Movie Have Many Serial )
     * ? With Category ( Actor Have Many Category )
     */

    public function serial()
    {
        return $this->belongsTo(Serial::class, 'serial_id');
    }
}
