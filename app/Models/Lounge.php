<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lounge extends Model
{
    protected $table = 'lounges';

    use SoftDeletes;

    protected $fillable = [
        'campu_id',
        'lounge',
        'description'
    ];
}
