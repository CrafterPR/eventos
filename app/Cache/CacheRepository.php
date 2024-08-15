<?php

namespace App\Cache;

class CacheRepository
{
    public static function cache(): CacheRepo
    {
        return resolve(CacheRepo::class);
    }
}
