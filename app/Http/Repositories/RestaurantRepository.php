<?php

namespace App\Http\Repositories;

use App\Models\Restaurant;

class RestaurantRepository
{
    protected $model;

    public function __construct(Restaurant $restaurant)
    {
        $this->model = $restaurant->query();
    }

    public function getAll()
    {
        return $this->model
            ->where('status', Restaurant::STATUS_APPROVED)
            ->orderByDesc('created_at')
            ->get();
    }

    public function getById(int $id)
    {
        return $this->model
            ->findOrFail($id)
            ->get();
    }
}
