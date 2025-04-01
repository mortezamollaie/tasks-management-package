<?php

namespace Mortezamollaie\TasksManagement\Http\Requests\Roles;

use App\ApiResponse\ApiFormRequest;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class RoleUpdateRequest extends ApiFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Gate::allows('update_role');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'display_name' => 'required|string',
            'permissions' => 'required|array',
            'permissions.*' => 'exists:permissions,id'
        ];
    }
}
