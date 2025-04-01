<?php

namespace Mortezamollaie\TasksManagement\database\seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Mortezamollaie\TasksManagement\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::factory()->state([
            'name' => 'admin',
            'display_name' => 'Admin'
        ])->create();
    }
}
