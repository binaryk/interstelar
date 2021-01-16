<?php

namespace App\Restify;

use App\Models\User;
use App\Rules\UserRoleRule;
use Binaryk\LaravelRestify\Fields\BelongsToMany;
use Binaryk\LaravelRestify\Fields\Field;
use Binaryk\LaravelRestify\Fields\Image;
use Binaryk\LaravelRestify\Http\Requests\RestifyRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserRepository extends Repository
{
    public static function related(): array
    {
        return [
            'roles' => BelongsToMany::make('roles', 'roles', RoleRepository::class)->withPivot(
                Field::make('policy')->rules('required'),
            )
        ];
    }

    public function fields(RestifyRequest $request)
    {
        return [
            Field::make('name')->storingRules('required'),

            Field::make('email')->storingRules('required', 'unique:users')->messages([
                'required' => 'This field is required.',
            ]),

            Image::make('avatar')->storeAs('avatar.jpg'),

            Field::make('password')
                ->value(fn(Request $request) => Hash::make($request->input('password')))
                ->storingRules('required', 'confirmed')
                ->hidden(),
        ];
    }
}
