<?php

namespace App\Policies;

use App\Models\Medicine;
use App\Models\User;

class MedicinePolicy
{
    public function viewAny(User $user)
    {
        return true;
    }

    public function view(User $user, Medicine $medicine)
    {
        return true;
    }

    public function create(User $user)
    {
        return true;
    }

    public function update(User $user, Medicine $medicine)
    {
        return true;
    }

    public function delete(User $user, Medicine $medicine)
    {
        return true;
    }

    public function restore(User $user, Medicine $medicine)
    {
        return true;
    }

    public function forceDelete(User $user, Medicine $medicine)
    {
        return true;
    }
}
