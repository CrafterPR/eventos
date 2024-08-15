<?php

namespace App\Cache;

use Closure;

class CacheRepo extends TaggedRepository
{
    public const TAG_PREFIX = 'cache-';

    private string $key;

    public function remember(string $cacheKey, $ttl, Closure $callback)
    {
        $this->key = $cacheKey;

        return $this->cache($ttl, $callback);
    }

    public function increment(string $cacheKey): bool|int
    {
        $this->key = $cacheKey;

        return $this->cacheIncrement();
    }

    public function decrement(string $cacheKey): bool|int
    {
        $this->key = $cacheKey;

        return $this->cacheDecrement();
    }

    public function cacheHasKey(string $cacheKey): bool
    {
        $this->key = $cacheKey;

        return parent::hasTaggedKey();
    }

    public function forgetKey(string $cacheKey): bool
    {
        $this->key = $cacheKey;

        return parent::forgetTaggedKey();
    }

    protected function getKey(): string
    {
        return self::TAG_PREFIX.':'.$this->key;
    }

    protected function getTTL($ttl = 1): int
    {
        return $ttl * 60;
    }

    protected function getTags(): array
    {
        return [
            $this->getBaseTag(),
        ];
    }

    private function getBaseTag(): string
    {
        return self::TAG_PREFIX;
    }
}
