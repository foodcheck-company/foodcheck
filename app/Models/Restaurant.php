<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
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

    public function dishes()
    {
        return $this->belongsToMany(Dish::class);
    }
}
