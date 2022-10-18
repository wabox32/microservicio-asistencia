<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Campu extends Model
{
    protected $table = 'campus';

    use SoftDeletes;

    protected $fillable = [
        'name',
        'description'
    ];
}
