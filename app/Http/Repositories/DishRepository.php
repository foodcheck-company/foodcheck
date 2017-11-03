<?php
/**
 * @author: Viktoria Zhukova
 */
namespace App\Http\Repositories;

use App\Models\Dish;

class DishRepository extends \App\Http\Repositories\BaseRepository
{
    protected $model;

    public function __construct(Dish $dish)
    {
        $this->model = $dish->query();
    }

    public function getAll()
    {
        return $this->model
            ->orderByDesc('created_at');
    }

    public function findById(int $id)
    {
        return $this->model
            ->findOrFail($id)
            ->get();
    }
}