<?php

namespace Mortezamollaie\TasksManagement\database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Mortezamollaie\TasksManagement\Models\Permission;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PermissionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Permission::class;

    public function definition(): array
    {
        return [
            //
        ];
    }
}
