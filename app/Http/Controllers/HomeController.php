<?php

namespace App\Http\Controllers;

use App\Http\Repositories\HomeRepository;
use Illuminate\Http\Request;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class HomeController extends ApiController
{
    /**
     * @var HomeRepository
     */
    protected $repository;

    /**
     * ContestController constructor.
     */
    public function __construct(Request $request)
    {
        parent::__construct($request);

        $this->repository = new HomeRepository();
    }

    public function getRestaurantsList()
    {
        $restaurants = $this->repository->getRestaurantsList();

        if (!$restaurants) {
            return $this->respondBadRequest('Something went wrong!');
        } else {
            return $this->respondSuccess($restaurants);
        }
    }
}
