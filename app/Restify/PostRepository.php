<?php

namespace App\Restify;

use App\Rules\UserRule;
use Binaryk\LaravelRestify\Eager\Related;
use Binaryk\LaravelRestify\Fields\BelongsTo;
use Binaryk\LaravelRestify\Fields\BelongsToMany;
use Binaryk\LaravelRestify\Fields\MorphToMany;
use Binaryk\LaravelRestify\Http\Requests\RestifyRequest;
use Binaryk\LaravelRestify\Repositories\ActionLogRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

class PostRepository extends Repository
{
    public static function related(): array
    {
        return [
            'logs' => MorphToMany::make('actionLogs', 'actionLogs', ActionLogRepository::class),
            'owner' => BelongsTo::make('foo', 'user', UserRepository::class),
        ];
    }

    public function fields(RestifyRequest $request)
    {
        return [
            field('title'),

            field('user_id')->value(Auth::id()),
        ];
    }
}
