<?php

namespace Mortezamollaie\TasksManagement\Http\Requests;

use App\ApiResponse\ApiFormRequest;
use Illuminate\Foundation\Http\FormRequest;

class AssignRoleRequest extends ApiFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'roles' => 'required|array',
            'roles.*' => 'exists:roles,id'
        ];
    }
}
