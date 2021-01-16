<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can use restify feature for each CRUD operation.
     * So if this is not allowed, all operations will be disabled
     * @param User $user
     * @return mixed
     */
    public function allowRestify(User $user = null)
    {
        return true;
    }

    /**
     * Determine whether the user can get the model.
     *
     * @param User $user
     * @param Post $model
     * @return mixed
     */
    public function show(User $user, Post $model)
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param User $user
     * @return mixed
     */
    public function store(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can create multiple models at once.
     *
     * @param User $user
     * @return mixed
     */
    public function storeBulk(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param Post $model
     * @return mixed
     */
    public function update(User $user, Post $model)
    {
        return $model->user_id === $user->id;
    }

    /**
     * Determine whether the user can update bulk the model.
     *
     * @param User $user
     * @param Post $model
     * @return mixed
     */
    public function updateBulk(User $user, Post $model)
    {
        return $user->id === $model->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param Post $model
     * @return mixed
     */
    public function delete(User $user, Post $model)
    {
        return true;
    }

    public function activate(User $user, Post $post)
    {
        return $user->id === $post->user_id;
    }
}
