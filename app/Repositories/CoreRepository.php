<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Application;

abstract class CoreRepository
{
    protected $model;

    public function __construct()
    {
        $this->model = app($this->getModelClass());
    }

    abstract protected function getModelClass(): mixed;

    protected function startConditions(): Model|Application
    {
        return clone $this->model;
    }
}
