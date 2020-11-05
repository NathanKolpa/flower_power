<?php

namespace App\Policies;

use App\Models\ShoppingCartProduct;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ShoppingCartPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ShoppingCartProduct  $shoppingCartProduct
     * @return mixed
     */
    public function view(User $user, ShoppingCartProduct $shoppingCartProduct)
    {
        return $user->id == $shoppingCartProduct->user_id;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ShoppingCartProduct  $shoppingCartProduct
     * @return mixed
     */
    public function update(User $user, ShoppingCartProduct $shoppingCartProduct)
    {
        return $user->id == $shoppingCartProduct->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ShoppingCartProduct  $shoppingCartProduct
     * @return mixed
     */
    public function delete(User $user, ShoppingCartProduct $shoppingCartProduct)
    {
        return $user->id == $shoppingCartProduct->user_id;
    }
}
