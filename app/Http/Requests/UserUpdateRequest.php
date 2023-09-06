<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
     */
    public function rules(): array
    {
        if ($this->role == 'student') {
            return [
                'name' => ['required', 'max:255', 'string'],
                'email' => [
                    'required',
                    Rule::unique('users', 'email')->ignore($this->user),
                    'email',
                ],
                'role' => [
                    'required',
                    'in:student,librarian,bursar,class_teacher,store_keeper,head_master',
                ],
                'username' => ['required', 'max:255', 'string'],
                'password' => ['required'],
                'image' => ['nullable', 'image', 'max:9999'],
                'roles' => 'array',
            ];
        } else {
            return [
                'name' => ['required', 'max:255', 'string'],
                'email' => [
                    'required',
                    Rule::unique('users', 'email')->ignore($this->user),
                    'email',
                ],
                'role' => [
                    'required',
                    'in:student,librarian,bursar,class_teacher,store_keeper,head_master',
                    'unique:users,role',
                ],
                'username' => ['required', 'max:255', 'string'],
                'password' => ['required'],
                'image' => ['nullable', 'image', 'max:9999'],
                'roles' => 'array',
            ];
        }
    }
}