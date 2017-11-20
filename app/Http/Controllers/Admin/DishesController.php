<?php
/**
 * @author: Viktoria Zhukova <v.zhukova@lucky-labs.com>
 */
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Repositories\DishRepository;
use Illuminate\Http\Request;

class DishesController extends Controller
{
    /**
     * @var DishRepository
     */
    protected $repository;

    public function __construct(Request $request, DishRepository $dishRepository)
    {
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