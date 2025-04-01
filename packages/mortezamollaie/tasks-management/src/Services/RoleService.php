<?php

namespace Mortezamollaie\TasksManagement\Services;

use Illuminate\Support\Arr;
use Mortezamollaie\TasksManagement\ApiResponse\ServiceWrapper;
use Mortezamollaie\TasksManagement\Models\Role;

class RoleService
{
    public function getAllRole()
    {
        return app(ServiceWrapper::class)(function(){
          return Role::paginate();
        });
    }

    public function createRole(array $inputs)
    {
        return app(ServiceWrapper::class)(function() use ($inputs){
            $role = Role::create(Arr::except($inputs, 'permissions'));
            $role->permissions()->attach($inputs['permissions']);
            return $role;
        });
    }

    public function showRole($id)
    {
        return app(ServiceWrapper::class)(function() use($id) {
            return Role::findOrFail($id);
        });
    }

    public function updateRole(array $inputs, $id)
    {
        return app(ServiceWrapper::class)(function() use ($inputs, $id){
            $role = Role::findOrFail($id);
            $role->update(Arr::except($inputs, 'permissions'));
            $role->permissions()->sync($inputs['permissions']);
            return $role;
        });
    }

    public function deleteRole($id)
    {
        return app(ServiceWrapper::class)(function() use($id) {
            return Role::whereId($id)->delete();
        });
    }
}
