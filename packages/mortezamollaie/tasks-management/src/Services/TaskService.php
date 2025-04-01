<?php

namespace Mortezamollaie\TasksManagement\Services;

use Mortezamollaie\TasksManagement\ApiResponse\ServiceWrapper;
use Mortezamollaie\TasksManagement\Models\Task;

class TaskService
{
    public function getAllTask($request)
    {
        return app(ServiceWrapper::class)(function()use($request){
            $query = Task::query();

            if($request->has('is_completed')){
                $isCompleted = filter_var($request->get('is_completed'), FILTER_VALIDATE_BOOLEAN);
                $query->where('is_completed', $isCompleted);
            }

            return $query->paginate();
        });
    }

    public function createTask(array $data)
    {
        return app(ServiceWrapper::class)(function() use ($data){
            $data['user_id'] = auth()->user()->id;
            $path = $data['attachment']->store('uploads', 'public');
            $data['attachment'] = $path;
            return Task::create($data);
        });
    }

    public function getTask(int $id)
    {
        return app(ServiceWrapper::class)(function() use ($id){
           return Task::whereId($id)->get();
        });
    }

    public function updateTask(int $id, array $data)
    {
        return app(ServiceWrapper::class)(function() use ($id, $data) {
            $task = Task::findOrFail($id);
            if (!empty($data['attachment'])) {
                $path = $data['attachment']->store('uploads', 'public');
                $data['attachment'] = $path;
            }
            $data = array_filter($data, fn($value) => !is_null($value));
            $task->update($data);
            return $task;
        });
    }

    public function deleteTask(int $id)
    {
        return app(ServiceWrapper::class)(function() use ($id) {
           Task::whereId($id)->delete();
        });
    }

}
