<?php
/**
 * @author: Viktoria Zhukova
 */

namespace App\Http\Controllers\Api;

use App\Http\Repositories\DishRepository;
use Illuminate\Http\Request;

class DishesController extends ApiController
{
    /**
     * @var DishRepository
     */
    protected $repository;


    public function __construct(Request $request, DishRepository $dishRepository)
    {
        parent::__construct($request);

        $this->repository = $dishRepository;
    }

    public function index()
    {
        $dishes = $this->repository->getAll();
        $dishes = $this->paginate($dishes);

        return $dishes
            ? $this->respondWithPagination($dishes)
            : $this->respondWithError('Restaurants not found');
    }
}
