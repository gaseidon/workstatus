<?php

namespace App\Repositories;

use App\Repositories\CoreRepository;
use App\Models\User as Model;


class UserRepository extends CoreRepository
{
    protected function getModelClass(): string
    {
        return Model::class;
    }

    public function userExists($fieldType, $typeSigin){
        return $this->startConditions()->where($fieldType, $typeSigin)->exists();
    }
}
