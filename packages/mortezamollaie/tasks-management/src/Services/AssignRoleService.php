<?php

namespace Mortezamollaie\TasksManagement\Services;

use App\Models\User;
use Mortezamollaie\TasksManagement\ApiResponse\ServiceWrapper;

class AssignRoleService
{
    public function assignRolesToUser($id, array $roleIds)
    {
        return app(ServiceWrapper::class)(function() use($id, $roleIds) {
            $user = User::findOrFail($id);

            if (!is_array($roleIds)) {
                return response()->json(['message' => 'Invalid role IDs format'], 400);
            }

            $roleIds = array_map('intval', $roleIds);

            return $user->roles()->sync($roleIds);
        });

    }
}
