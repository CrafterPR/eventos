<?php

namespace Database\Factories;

use Faker\Provider\Base;

class SalutationProvider extends Base
{
    protected static array $salutations = ['Dr.', 'Mr.', 'Mrs.', 'Ms.', 'Prof.'];

    public function salutation()
    {
        return static::randomElement(static::$salutations);
    }
}
