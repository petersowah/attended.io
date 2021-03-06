<?php

namespace App\Rules;

use App\Models\User;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class CurrentPasswordRule implements Rule
{
    /** @var \App\Models\User */
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function passes($attribute, $value)
    {
        return Hash::check($value, $this->user->password);
    }

    public function message()
    {
        return 'This is not your current password.';
    }
}
