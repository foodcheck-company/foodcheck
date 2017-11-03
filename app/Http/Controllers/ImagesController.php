<?php
/**
 * @author: Viktoria Zhukova
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImagesController extends ApiController
{
    public function __construct(Request $request)
    {
        parent::__construct($request);
    }

    public function index()
    {

    }

    public function store()
    {
        if ($this->request->hasFile('image')) {

        }
    }
}
