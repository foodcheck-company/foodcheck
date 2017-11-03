<?php

namespace App\Http\Repositories;

use App\Models\Restaurant;

class RestaurantRepository extends BaseRepository
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
            ->with(['positions.dishes']);
    }

    public function findById(int $id)
    {
        return $this->model
            ->findOrFail($id)
            ->get();
    }
}
