<?php

namespace App\Http\Front\Controllers\Slots;

use App\Actions\ClaimSlotAction;
use App\Models\Slot;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ClaimSlotController
{
    use AuthorizesRequests;

    public function __invoke(Slot $slot, ClaimSlotAction $claimSlotAction)
    {
        $this->authorize('claim', $slot);

        $claimSlotAction->execute(current_user(), $slot);

        flash()->success('An admin of event will soon review your claim.');

        return back();
    }
}
