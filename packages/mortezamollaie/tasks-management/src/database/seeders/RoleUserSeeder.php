<?php

namespace Mortezamollaie\TasksManagement\database\seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Mortezamollaie\TasksManagement\Models\Role;

class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::whereEmail('admin@gmail.com')->first();
        $role = Role::whereName('admin')->first();
        $user->roles()->attach([$role->id]);
    }
}
