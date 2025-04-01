<?php

namespace Mortezamollaie\TasksManagement\Http\Requests\Roles;

use Illuminate\Support\Facades\Gate;
use Mortezamollaie\TasksManagement\ApiResponse\ApiFormRequest;

class RoleDeleteRequest extends ApiFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Gate::allows('delete_role');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
        ];
    }
}
