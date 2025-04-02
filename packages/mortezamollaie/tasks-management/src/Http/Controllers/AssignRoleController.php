<?php

namespace Mortezamollaie\TasksManagement\Http\Controllers;

use App\Http\Controllers\Controller;
use Mortezamollaie\TasksManagement\ApiResponse\Facades\ApiResponse;
use Mortezamollaie\TasksManagement\Http\Requests\AssignRoleRequest;
use Mortezamollaie\TasksManagement\Services\AssignRoleService;

class AssignRoleController extends Controller
{

    public function __construct(public AssignRoleService  $assignRoleService)
    {
    }

    public function __invoke(AssignRoleRequest $request, $id)
    {
        $result = $this->assignRoleService->assignRolesToUser($id, $request->validated()['roles']);
        if(!$result->ok){
            return ApiResponse::withMessage('Something went wrong, try again later')->withData($result->data)->withStatus(500)->build()->response();
        }

        return ApiResponse::withMessage('Role assigned to user successfully.')->withData($result->data)->withStatus(200)->build()->response();
    }
}
