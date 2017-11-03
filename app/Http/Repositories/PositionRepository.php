<?php
/**
 * @author: Viktoria Zhukova
 */
namespace App\Http\Repositories;

use App\Models\Position;

class PositionRepository extends BaseRepository
{
    protected $model;

    public function __construct(Position $position)
    {
        $this->model = $position->query();
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