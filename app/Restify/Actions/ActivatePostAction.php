<?php

namespace App\Restify\Actions;

use App\Models\Post;
use Binaryk\LaravelRestify\Actions\Action;
use Binaryk\LaravelRestify\Actions\DestructiveAction;
use Binaryk\LaravelRestify\Http\Requests\ActionRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Collection;

class ActivatePostAction extends DestructiveAction
{
    public static $uriKey = 'activate';

    public static int $chunkCount = 5;

    public function handle(ActionRequest $request, Collection $models): JsonResponse
    {
        dump(
            $models->count()
        );
        $models->filter(fn(Post $post) => $request->user()->can('activate', $post))
            ->each(fn(Post $post) => $post->activate());

        return $this->response()->respond();
    }

    public function payload(): array
    {
        return [
            'repositories' => 'This field is required, it should contain the list of ids of models.',
            'datetime' => 'required',
        ];
    }
}
