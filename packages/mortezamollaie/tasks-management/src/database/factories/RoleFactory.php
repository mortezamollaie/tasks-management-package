<?php

namespace Mortezamollaie\TasksManagement\database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Mortezamollaie\TasksManagement\Models\Role;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class RoleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Role::class;

    public function definition(): array
    {
        return [
            //
        ];
    }
}
