<?php

namespace App\Restify;

use Binaryk\LaravelRestify\Fields\Field;
use Binaryk\LaravelRestify\Http\Requests\RestifyRequest;

class RoleRepository extends Repository
{
    public function fields(RestifyRequest $request)
    {
        return [
            Field::make('name'),
        ];
    }
}
