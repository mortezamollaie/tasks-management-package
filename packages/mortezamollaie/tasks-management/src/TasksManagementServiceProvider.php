<?php

namespace Mortezamollaie\TasksManagement;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Mortezamollaie\TasksManagement\ApiResponse\ApiResponseBuilder;
use Mortezamollaie\TasksManagement\Models\Permission;

class TasksManagementServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('apiResponse', function () {
            return new ApiResponseBuilder();
        });
    }

    public function boot()
    {
        Route::prefix('api')
            ->group(function () {
                $this->loadRoutesFrom(__DIR__ . '/routes/api.php');
            });

        $this->loadMigrationsFrom(__DIR__.'/database/migrations');
        $this->loadViewsFrom(__DIR__ . '/resources/views', 'tasks-management');

        $this->publishes([
            __DIR__.'/database/seeders' => database_path('seeders'),
        ], 'seeders');

        if ($this->app->runningInConsole()) {
            $this->commands([
                \Mortezamollaie\TasksManagement\Console\Commands\SendHighlightedTasksReminderCommand::class,
            ]);
        }

        Permission::with('roles')->each(function ($permission) {
            Gate::define($permission->name, function ($user) use ($permission) {
                return !!$permission->roles->intersect($user->roles)->count();
            });
        });
    }
}
