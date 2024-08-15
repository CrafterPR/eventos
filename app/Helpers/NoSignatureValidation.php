<?php

namespace App\Helpers;

use Illuminate\Http\Request;
use Spatie\WebhookClient\SignatureValidator\SignatureValidator;
use Spatie\WebhookClient\WebhookConfig;

class NoSignatureValidation implements SignatureValidator
{

    public function isValid(Request $request, WebhookConfig $config): bool
    {
        return true;
    }
}
