<?php

namespace App\Enums;

enum RoleEnum
{
    const FREELANCER = 'freelancer';
    const ORDER = 'order';
    const MODERATOR = 'moderator';
    const ADMIN = 'admin';

    public static function getRoles(): array
    {
        return [
            self::FREELANCER,
            self::ORDER,
            self::MODERATOR,
            self::ADMIN,

        ];
    }
}
