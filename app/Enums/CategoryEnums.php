<?php

namespace App\Enums;

final class CategoryEnums
{
    const PRIVATE = 'private';
    const SHARING = 'sharing';
    
    public static $USER_TYPES =
    [
        self::PRIVATE,
        self::SHARING
    ];
}
