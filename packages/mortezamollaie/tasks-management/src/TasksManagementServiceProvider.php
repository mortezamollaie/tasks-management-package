<?php

namespace Mortezamollaie\TasksManagement;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Mortezamollaie\TasksManagement\ApiResponse\ApiResponseBuilder;

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
    }
}
