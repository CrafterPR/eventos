<?php

namespace App\Models\Traits;

use Illuminate\Support\Str;

trait Uuidable
{
    public string $uuidColumn = 'uuid';

    /**
     * Add createUuid method to boot
     */
    protected static function bootUuidable(): void
    {
        static::creating(function ($model) {
            $model->{$model->getKeyName()} = Str::orderedUuid()->toString();
        });
    }

    /**
     * Get the value indicating whether the IDs are incrementing.
     */
    public function getIncrementing(): bool
    {
        return false;
    }

    /**
     * Get the primary key for the model.
     */
    public function getKeyName(): string
    {
        return $this->uuidColumn;
    }

    /**
     * Get the auto-incrementing key type.
     */
    public function getKeyType(): string
    {
        return 'string';
    }
}
