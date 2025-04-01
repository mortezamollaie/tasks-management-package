<?php

namespace Mortezamollaie\TasksManagement\database\seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Mortezamollaie\TasksManagement\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::factory()->state([
            'name' => 'read_task',
            'display_name' => 'Read Task',
        ])->create();

        Permission::factory()->state([
            'name' => 'create_task',
            'display_name' => 'Create Task',
        ])->create();

        Permission::factory()->state([
            'name' => 'update_task',
            'display_name' => 'Update Task',
        ])->create();

        Permission::factory()->state([
            'name' => 'delete_task',
            'display_name' => 'Delete Task',
        ])->create();

        Permission::factory()->state([
            'name' => 'read_role',
            'display_name' => 'Read Role',
        ])->create();

        Permission::factory()->state([
            'name' => 'create_role',
            'display_name' => 'Create Role',
        ])->create();

        Permission::factory()->state([
            'name' => 'update_role',
            'display_name' => 'Update Role',
        ])->create();

        Permission::factory()->state([
            'name' => 'delete_role',
            'display_name' => 'Delete Role',
        ])->create();

        Permission::factory()->state([
            'name' => 'assign_role',
            'display_name' => 'Assign Role',
        ])->create();
    }
}
