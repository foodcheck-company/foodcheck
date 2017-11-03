<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    const STATUS_DENIED = 0;
    const STATUS_APPROVED = 1;

    protected $fillable = [
        'name',
        'description',
        'work_time_up',
        'work_time_end',
        'delivery_time',
        'link',
        'rating',
        'status',
    ];

    public function positions()
    {
        return $this->belongsToMany(Position::class);
    }
}
