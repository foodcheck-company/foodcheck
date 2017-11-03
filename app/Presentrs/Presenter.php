<?php

namespace App\Presenters;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Str;

abstract class Presenter implements Arrayable
{
    protected $model;

    protected $args;

    /**
     * Arrayable attributes (functions/presents)
     * @var array
     */
    protected $arrayable = [];

    /**
     * Presenter constructor.
     * @param $model
     */
    public function __construct($model = null, $args = null)
    {
        $this->model = $model;
        $this->args  = $args;
    }

    public function getArrayableAttributes()
    {
        return $this->arrayable;
    }

    /**
     * @param $method
     * @param $args
     * @return mixed
     */
    public function __call($method, $args)
    {
        return call_user_func_array([$this->model, $method], $args);
    }

    /**
     * @param $name
     * @return mixed
     */
    public function __get($name)
    {
        return $this->model->{$name};
    }

    /**
     * @return array
     */
    public function toArray()
    {
        $result = [];

        foreach ($this->arrayable as $key) {
            $methodName = 'get'.Str::studly($key).'Present';

            if (method_exists($this, $methodName)) {
                $result[$key] = $this->{$methodName}();
            }
            else {
                $result[$key] = is_array($this->model) && isset($this->model[$key]) ? $this->model[$key] : $this->model->{$key};
            }
        }

        return $result;
    }
}
