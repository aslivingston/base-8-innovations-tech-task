<?php

namespace App\Policies;

use App\Models\Gradient;
use App\Models\User;

class GradientPolicy
{
    public function view(User $user, Gradient $gradient): bool
    {
        return $user->id === $gradient->user_id;
    }

    public function update(User $user, Gradient $gradient): bool
    {
        return $user->id === $gradient->user_id;
    }

    public function delete(User $user, Gradient $gradient): bool
    {
        return $user->id === $gradient->user_id;
    }
}