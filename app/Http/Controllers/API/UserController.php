<?php

namespace App\Http\Controllers\API;

use App\Enum\UserType;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Transformers\UserTransformer;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;

class UserController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $request->validate([
            "type" => "nullable|in:exhibitor,delegate"
        ]);

        $users = User::query()
            ->when(request('include'), function ($query, $include) {
                $with = explode(",", $include);
                return $query->with($with);
            })
            ->when(request("type"))
            ->where("user_type", $request->type)
            ->latest()
            ->paginate(perPage: request("per_page", 10));

        return fractal()
            ->collection($users, new UserTransformer())
            ->parseIncludes($request->include)
            ->paginateWith(new IlluminatePaginatorAdapter($users))
            ->addMeta([
                "filters" => [
                    "type" => UserType::cases(),
                ],
            ])
            ->respond(200, [], JSON_PRETTY_PRINT);
    }

    /**
     * @param User $user
     * @param Request $request
     * @return JsonResponse
     */
    public function show(User $user, Request $request): JsonResponse
    {
        if ($request->filled("include")) {
            $with = explode(",", $request->include);
            $user->load($with);
        }

        return fractal()
            ->item($user, new UserTransformer())
            ->parseIncludes($request->include)
            ->respond(200, [], JSON_PRETTY_PRINT);
    }

    public function delivery_time(?string $email): JsonResponse
    {
        User::query()
        ->whereEmail($email)
        ->update(['email_delivered_at' => now()]);

        return new JsonResponse([
        'message' => 'OK',
         'code' => 201]);
    }
}
