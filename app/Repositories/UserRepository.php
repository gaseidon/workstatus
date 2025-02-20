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

    public function emailExists($email){
        return $this->startConditions()->where('email', $email)->exists();
    }
}
