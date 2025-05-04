<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Role;

class DashboardPolicy
{
    /**
     * Create a new policy instance.
     */
    
    public function viewDashboard(User $user): bool
    {
        // Check if the user is an admin or manager
        if ($user->role->name === 'admin' || $user->role->name === 'manager') {
            return true;
        }

        return false;
    }
}
