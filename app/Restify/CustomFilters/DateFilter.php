<?php

namespace App\Restify\CustomFilters;

use Binaryk\LaravelRestify\Http\Requests\RestifyRequest;
use Binaryk\LaravelRestify\TimestampFilter;

class DateFilter extends TimestampFilter
{
    public function filter(RestifyRequest $request, $query, $value)
    {
        dd($value);
    }
}
