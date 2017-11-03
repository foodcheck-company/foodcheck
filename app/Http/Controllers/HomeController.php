<?php

namespace App\Http\Controllers;

use App\Http\Repositories\RestaurantRepository;
use Illuminate\Http\Request;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class HomeController extends ApiController
{
    /**
     * @var RestaurantRepository
     */
    protected $repository;


    public function __construct(Request $request, RestaurantRepository $restaurantRepository)
    {
        parent::__construct($request);

        $this->repository = $restaurantRepository;
    }

    public function getRestaurantsList()
    {
        $restaurants = $this->repository->getRestaurantsList();

        return $restaurants
            ? $this->respondWithPagination($restaurants)
            : $this->respondWithError('Restaurants not found');
    }
}
