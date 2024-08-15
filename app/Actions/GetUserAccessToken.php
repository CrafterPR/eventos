<?php

namespace App\Actions;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Laravel\Sanctum\NewAccessToken;
use Lorisleiva\Actions\Concerns\AsAction;

class GetUserAccessToken
{
    use AsAction;

    public function handle(User $user): NewAccessToken
    {
        return $user->createToken('Bearer');
    }

    public function asController(Request $request): NewAccessToken
    {
        $user = $request->user();
        return $this->handle($user);
    }

    public function jsonResponse(NewAccessToken $newAccessToken): JsonResponse
    {
        return new JsonResponse([
            "bearer_token" => $newAccessToken->plainTextToken,
        ]);
    }
}
