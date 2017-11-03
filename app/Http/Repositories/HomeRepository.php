<?php

namespace App\Http\Repositories;
use App\Models\Restaurant;


/**
 * Class BriefRepository
 * @package App\Http\Repositories
 */
class HomeRepository
{
    public function getRestaurantsList() {
        $restaurants = Restaurant::where('status_approved', 1)->orderBy('id', 'desc')->get();
    }
}
