<?php

namespace Mortezamollaie\TasksManagement\Services;

use Mortezamollaie\TasksManagement\ApiResponse\ServiceWrapper;
use Mortezamollaie\TasksManagement\Models\Task;

class TaskService
{
    public function createTask(array $data)
    {
        return app(ServiceWrapper::class)(function() use ($data){
            $data['user_id'] = auth()->user()->id;
            $path = $data['attachment']->store('uploads', 'public');
            $data['attachment'] = $path;
            return Task::create($data);
        });
    }
}
