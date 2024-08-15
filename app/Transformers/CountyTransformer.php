<?php

namespace App\Transformers;

use App\Models\County;
use League\Fractal\TransformerAbstract;

class CountyTransformer extends TransformerAbstract
{

    /**
     * A Fractal transformer.
     *
     * @param County $county
     * @return array
     */
    public function transform(County $county): array
    {
        return [
            "id" => $county->id,
            "name" => $county->name
        ];
    }
}
