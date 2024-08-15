<?php

namespace App\Cache;

use Closure;
use Illuminate\Cache\RedisStore;
use Illuminate\Cache\RedisTaggedCache;
use Illuminate\Cache\Repository;
use Illuminate\Cache\TagSet;
use Illuminate\Support\Facades\Cache;

abstract class TaggedRepository
{
    private Repository $cache;

    public function __construct(Repository $cache)
    {
        $this->cache = $cache;
    }

    /**
     * @return mixed
     */
    protected function cache($ttl, Closure $callback)
    {
        $key = $this->getKey();
        $ttl = $this->getTTL($ttl);
        $tags = $this->getTags();

        $shouldExpireTags = false;

        try {
            return Cache::tags($tags)->remember($key, $ttl, function () use ($callback, &$shouldExpireTags) {
                $shouldExpireTags = true;

                return $callback();
            });
        } finally {
            if ($shouldExpireTags) {
                $this->expireTags($tags, $ttl);
            }
        }
    }

    abstract protected function getKey(): string;

    abstract protected function getTTL($ttl): int;

    abstract protected function getTags(): array;

    private function expireTags(array $tags, int $ttl): void
    {
        $store = $this->cache->getStore();

        // If the store is not a Redis store, we can't expire tags.
        if (! ($store instanceof RedisStore)) {
            return;
        }

        $client = $store->connection()->client();
        $prefix = $store->getPrefix();
        $tagSet = new TagSet($store, $tags);
        $namespace = $tagSet->getNamespace();

        foreach (explode('|', $namespace) as $segment) {
            $referenceTagKey = $prefix.$segment.':'.RedisTaggedCache::REFERENCE_KEY_STANDARD;
            /** @var int $currentTTL */
            $currentTTL = $client->ttl($referenceTagKey);
            $client->expire($referenceTagKey, max($ttl, $currentTTL));
        }

        foreach ($tags as $tag) {
            $tagKey = $tagSet->tagKey($tag);
            /** @var int $currentTTL */
            $currentTTL = $client->ttl($prefix.$tagKey);
            $client->expire($prefix.$tagKey, max($ttl, $currentTTL));
        }
    }

    /**
     * @return bool|int
     */
    protected function cacheIncrement()
    {
        $key = $this->getKey();
        $tags = $this->getTags();
        $ttl = $this->getTTL();

        $value = Cache::tags($tags)->increment($key);

        $this->expireKey($tags, $key, $ttl);
        $this->expireTags($tags, $ttl);

        return $value;
    }

    private function expireKey(array $tags, string $key, int $ttl): void
    {
        $store = $this->cache->getStore();

        // If the store is not a Redis store, we can't expire the key.
        if (! ($store instanceof RedisStore)) {
            return;
        }

        $client = $store->connection()->client();

        $prefix = $store->getPrefix();
        $taggedKey = Cache::tags($tags)->taggedItemKey($key);

        $client->expire($prefix.$taggedKey, $ttl);
    }

    protected function cacheDecrement()
    {
        $key = $this->getKey();
        $tags = $this->getTags();
        $ttl = $this->getTTL();

        $value = Cache::tags($tags)->decrement($key);

        $this->expireKey($tags, $key, $ttl);
        $this->expireTags($tags, $ttl);

        return $value;
    }

    protected function hasTaggedKey(): bool
    {
        $tags = $this->getTags();
        $key = $this->getKey();

        return Cache::tags($tags)->has($key);
    }

    /**
     * @return array|mixed
     */
    protected function getTaggedKey()
    {
        $tags = $this->getTags();
        $key = $this->getKey();

        return Cache::tags($tags)->get($key);
    }

    protected function forgetTaggedKey(): bool
    {
        $tags = $this->getTags();
        $key = $this->getKey();

        return Cache::tags($tags)->forget($key);
    }

    protected function flushTags(array $tags): bool
    {
        return Cache::tags($tags)->flush();
    }
}
