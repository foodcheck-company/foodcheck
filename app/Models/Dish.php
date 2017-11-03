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
        'qualify',
        'position_id'
    ];

    public function position()
    {
        return $this->belongsTo(Position::class);
    }
}
