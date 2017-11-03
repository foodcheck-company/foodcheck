<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    protected $fillable = [
        'name',
        'description',
        'size',
        'weight',
        'price',
        'qualify'
    ];

    public function restaurants()
    {
        return $this->belongsToMany(Restaurant::class);
    }
}
