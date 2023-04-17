<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\SoftDeletes;

class SerialActor extends Pivot
{
    use HasFactory, SoftDeletes;

    protected $table = 'serial_actors';

    public $incrementing = true;

    /**
     * ! Relations
     * ? With Serial ( Movie Have Many Serial )
     * ? With Actor ( Actor Have Many Movie )
     */
}
