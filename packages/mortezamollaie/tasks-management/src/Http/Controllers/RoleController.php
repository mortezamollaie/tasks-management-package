<?php

namespace Mortezamollaie\TasksManagement\Http\Controllers;

use App\Http\Controllers\Controller;
use Mortezamollaie\TasksManagement\ApiResponse\Facades\ApiResponse;
use Mortezamollaie\TasksManagement\Http\Requests\Roles\RoleDeleteRequest;
use Mortezamollaie\TasksManagement\Http\Requests\Roles\RoleIndexRequest;
use Mortezamollaie\TasksManagement\Http\Requests\Roles\RoleShowRequest;
use Mortezamollaie\TasksManagement\Http\Requests\Roles\RoleStoreRequest;
use Mortezamollaie\TasksManagement\Http\Requests\Roles\RoleUpdateRequest;
use Mortezamollaie\TasksManagement\Http\Resources\RoleApiResource;
use Mortezamollaie\TasksManagement\Http\Resources\RoleListApiResource;
use Mortezamollaie\TasksManagement\Services\RoleService;

class RoleController extends Controller
{

    public function __construct(public RoleService $roleService)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(RoleIndexRequest $request)
    {
        $result = $this->roleService->getAllRole();
        if(!$result->ok){
            return ApiResponse::withMessage('Something went wrong, try again later')->withData($result->data)->withStatus(500)->build()->response();
        }

        return ApiResponse::withStatus(200)->withData(RoleListApiResource::collection($result->data)->resource)->build()->response();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoleStoreRequest $request)
    {
        $result = $this->roleService->createRole($request->validated());

        if(!$result->ok){
            return ApiResponse::withMessage('Something went wrong, try again later')->withData($result->data)->withStatus(500)->build()->response();
        }

        return ApiResponse::withMessage('Role created successfully.')->withStatus(200)->withData(new RoleApiResource($result->data))->build()->response();
    }

    /**
     * Display the specified resource.
     */
    public function show(RoleShowRequest $request, string $id)
    {
        $result = $this->roleService->showRole($id);

        if(!$result->ok){
            return ApiResponse::withMessage('Something went wrong, try again later')->withData($result->data)->withStatus(500)->build()->response();
        }

        return ApiResponse::withStatus(200)->withData(new RoleApiResource($result->data))->build()->response();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoleUpdateRequest $request, $id)
    {
        $result = $this->roleService->updateRole($request->validated(), $id);

        if(!$result->ok){
            return ApiResponse::withMessage('Something went wrong, try again later')->withData($result->data)->withStatus(500)->build()->response();
        }

        return ApiResponse::withMessage('Role updated successfully.')->withStatus(200)->withData(new RoleApiResource($result->data))->build()->response();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RoleDeleteRequest $request, $id)
    {
        $result = $this->roleService->deleteRole($id);

        if(!$result->ok){
            return ApiResponse::withMessage('Something went wrong, try again later')->withData($result->data)->withStatus(500)->build()->response();
        }

        return ApiResponse::withMessage('Role deleted successfully')->withStatus(200)->build()->response();
    }
}
