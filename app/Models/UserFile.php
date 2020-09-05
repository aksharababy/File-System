<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserFile extends Model
{
    use SoftDeletes;

    protected $table = 'user_files';

    protected $fillable = [
        'name', 'file', 'status',
    ];
}
