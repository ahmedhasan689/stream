<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoryUser extends Pivot
{
    use HasFactory, SoftDeletes;

    protected $table = 'show_category_users';

    public $incrementing = true;

    /**
     * ! Relations
     * ? With User ( Movie Have Many User )
     * ? With Category ( Actor Have Many Category )
     */
}
