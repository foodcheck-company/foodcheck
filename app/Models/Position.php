<?php
/**
 * @author: Viktoria Zhukova
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $fillable = [
        'name',
        'description'
    ];

    public function restaurants()
    {
        return $this->belongsToMany(Restaurant::class);
    }

    public function dishes()
    {
        return $this->hasMany(Dish::class);
    }
}