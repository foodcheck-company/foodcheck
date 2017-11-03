<?php
/**
 * @author: Viktoria Zhukova
 */

namespace App\Http\Repositories;


abstract class BaseRepository
{
    protected $model;

    abstract function getAll();
    abstract function getById(int $id);
}