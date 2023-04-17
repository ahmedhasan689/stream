<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SerialUser extends Model
{
    use HasFactory;

    protected $table = 'serial_user_likes';

    protected $fillable = ['serial_id', 'user_id', 'like'];
}
