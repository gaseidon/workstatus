<?php

namespace App\Enums;

enum RoleEnum
{
    const NOEXP = 'Нет опыта';
    const JUNIOR = 'Junior';
    const MIDDLE = 'Middle';
    const SENIOR = 'Senior';
    const TEAMLEAD = 'Team Lead';

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
