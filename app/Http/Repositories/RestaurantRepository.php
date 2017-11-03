<?php

namespace App\Http\Repositories;

use App\Models\Restaurant;

class RestaurantRepository
{
    public function getRestaurantsList()
    {
        $restaurants = Restaurant::query()->where('status', Restaurant::STATUS_APPROVED)->orderByDesc('created_at')->get();

        return $restaurants;
    }
}
