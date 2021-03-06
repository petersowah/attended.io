<?php

namespace App\Actions;

use App\Models\User;

class UpdateUserAction
{
    public function execute(User $user, array $attributes): User
    {
        $oldEmail = $user->email;

        $user->name = $attributes['name'];
        $user->email = $attributes['email'];

        $user->save();

        if ($user->email !== $oldEmail) {
            $user
                ->markEmailAsUnverified()
                ->sendEmailVerificationNotification();
        }

        return $user;
    }
}
