<?php

namespace App\Restify\Matchers;

use Binaryk\LaravelRestify\Filter;
use Binaryk\LaravelRestify\Http\Requests\RestifyRequest;

class DateTimeFilter extends Filter
{
    public function filter(RestifyRequest $request, $query, $value)
    {
        // $query->where('{{ attribute }}', $request->input('{{ query }}'));
    }
}
