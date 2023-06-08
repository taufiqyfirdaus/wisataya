<?php

namespace App\Policies;

use App\Models\Budaya;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BudayaPolicy
{
    use HandlesAuthorization;
    public function edit(User $user, Budaya $budaya){
        return $user->ownsBudaya($budaya);
    }
}
