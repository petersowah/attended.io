<?php

namespace App\Policies;

use App\Models\Event;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class EventPolicy
{
    use HandlesAuthorization;

    public function administer(User $user, Event $event): bool
    {
        return $user->owns($event);
    }

    public function addReview(User $user, Event $event): bool
    {
        return $event->canBeReviewedBy($user);
    }
}
