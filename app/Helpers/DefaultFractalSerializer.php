<?php

namespace App\Helpers;

use Spatie\Fractalistic\ArraySerializer;

/**
 * Class DefaultSerializer
 * @package App\Library
 */
class DefaultFractalSerializer extends ArraySerializer
{

    /**
     * @param $resourceKey
     * @param array $data
     * @return array|array[]
     */
    public function collection($resourceKey, array $data): array
    {
        if ($resourceKey) {
            return $resourceKey == 'include' ? $data : [$resourceKey => $data];
        }

        return ['data' => $data];
    }

    /**
     * @param $resourceKey
     * @param array $data
     * @return array|array[]
     */
    public function item($resourceKey, array $data): array
    {
        if ($resourceKey) {
            return $resourceKey == 'include' ? $data : [$resourceKey => $data];
        }

        return ['data' => $data];
    }
}
