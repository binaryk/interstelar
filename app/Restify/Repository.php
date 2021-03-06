<?php

namespace App\Restify;

use Binaryk\LaravelRestify\Http\Requests\RestifyRequest;
use Binaryk\LaravelRestify\Repositories\Repository as RestifyRepository;

abstract class Repository extends RestifyRepository
{

    /**
     * Build a "show" and "index" query for the given repository.
     *
     * @param  RestifyRequest  $request
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public static function mainQuery(RestifyRequest $request, $query)
    {
        return $query;
    }

    /**
     * Build an "index" query for the given repository.
     *
     * @param  RestifyRequest  $request
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public static function indexQuery(RestifyRequest $request, $query)
    {
        return $query;
    }

    /**
     * Build a "show" query for the given repository.
     *
     * @param  RestifyRequest  $request
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public static function detailQuery(RestifyRequest $request, $query)
    {
        return $query;
    }
}
