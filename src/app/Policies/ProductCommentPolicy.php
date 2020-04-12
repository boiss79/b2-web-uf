<?php

namespace App\Policies;

use App\ProductComment;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductCommentPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\ProductComment  $productComment
     * @return mixed
     */
    public function update(User $user, ProductComment $productComment)
    {
        return $user->id === $productComment->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\ProductComment  $productComment
     * @return mixed
     */
    public function delete(User $user, ProductComment $productComment)
    {
        return $user->id === $productComment->user_id;
    }
}
