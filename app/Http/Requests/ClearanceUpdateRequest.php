<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClearanceUpdateRequest extends FormRequest
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
        return [
            'student_id' => ['required', 'exists:students,id'],
            'name' => ['required', 'max:255', 'string'],
            'registration_number' => ['required', 'max:255', 'string'],
            // 'block_number' => ['required', 'max:255', 'string'],
            // 'room_number' => ['required', 'max:255', 'string'],
            'level' => ['required', 'max:255', 'string'],
            'librarian' => ['nullable', 'in:0,1'],
            'bursar' => ['nullable', 'in:0,1'],
            'class_teacher' => ['nullable', 'in:0,1'],
            'matron_patron' => ['nullable', 'in:0,1'],
            'store_keeper' => ['nullable', 'in:0,1'],
            'head_master' => ['nullable', 'in:0,1'],
        ];
    }
}