<?php

namespace App\Policies;

use App\Models\Penginapan;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PenginapanPolicy
{
    use HandlesAuthorization;
    public function edit(User $user, Penginapan $penginapan){
        return $user->ownsPenginapan($penginapan);
    }
}
