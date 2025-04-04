<?php

namespace Mortezamollaie\TasksManagement\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Mortezamollaie\TasksManagement\ApiResponse\Facades\ApiResponse;
use Mortezamollaie\TasksManagement\Http\Requests\TaskDeleteRequest;
use Mortezamollaie\TasksManagement\Http\Requests\TaskIndexRequest;
use Mortezamollaie\TasksManagement\Http\Requests\TaskShowRequest;
use Mortezamollaie\TasksManagement\Http\Requests\TaskStoreRequest;
use Mortezamollaie\TasksManagement\Http\Requests\TaskUpdateRequest;
use Mortezamollaie\TasksManagement\Http\Resources\TaskApiResource;
use Mortezamollaie\TasksManagement\Http\Resources\TaskListApiResource;
use Mortezamollaie\TasksManagement\Models\Task;
use Mortezamollaie\TasksManagement\Services\TaskService;

class TaskController extends Controller{

    protected $taskService;

    public function __construct(TaskService $taskService){
        $this->taskService = $taskService;
    }

    public function index(TaskIndexRequest $request)
    {
        $result = $this->taskService->getAllTask($request);
        if(!$result->ok){
            return ApiResponse::withMessage('Something went wrong, try again later')->withData($result->data)->withStatus(500)->build()->response();
        }

        return ApiResponse::withStatus(200)->withData(TaskListApiResource::collection($result->data)->resource)->build()->response();
    }

    public function store(TaskStoreRequest $request)
    {
        $result = $this->taskService->createTask($request->validated());
        if(!$result->ok){
            return ApiResponse::withMessage('Something went wrong, try again later')->withData($result->data)->withStatus(500)->build()->response();
        }

        return ApiResponse::withMessage('Task created successfully.')->withStatus(200)->withData(new TaskApiResource($result->data))->build()->response();
    }

    public function show(TaskShowRequest $request, $id)
    {
        $result = $this->taskService->getTask($id);
        if(!$result->ok){
            return ApiResponse::withMessage('Something went wrong, try again later')->withData($result->data)->withStatus(500)->build()->response();
        }

        return ApiResponse::withData($result->data)->withStatus(200)->build()->response();
    }

    public function update(TaskUpdateRequest $request, Task $task)
    {
        $result = $this->taskService->updateTask($task, $request->validated());
        if(!$result->ok){
            return ApiResponse::withMessage('Something went wrong, try again later')->withData($result->data)->withStatus(500)->build()->response();
        }

        return ApiResponse::withMessage('Task updated successfully.')->withStatus(200)->withData(new TaskApiResource($result->data))->build()->response();
    }

    public function destroy(TaskDeleteRequest $request, $id)
    {
        $result = $this->taskService->deleteTask($id);
        if(!$result->ok){
            return ApiResponse::withMessage('Something went wrong, try again later')->withData($result->data)->withStatus(500)->build()->response();
        }

        return ApiResponse::withMessage('Task deleted successfully.')->withStatus(200)->build()->response();
    }
}
