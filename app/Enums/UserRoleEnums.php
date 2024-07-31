<?php

namespace App\Enums;

final class UserRoleEnums
{
    const ADMIN = 'admin';
    const USER = 'user';
    
    public static $USER_TYPES =
    [
        self::ADMIN,
        self::USER
    ];
    
}
