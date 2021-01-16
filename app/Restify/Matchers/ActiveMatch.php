<?php

namespace App\Restify\Matchers;

use Binaryk\LaravelRestify\Repositories\Matchable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ActiveMatch implements Matchable
{
    public function handle(Request $request, Builder $query)
    {
        if ($request->boolean('active')) {
            $query->where('is_active', true);
        } else {
            $query->where('is_active', false);
        }
    }
}
