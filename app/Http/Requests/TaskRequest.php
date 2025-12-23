<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
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
            'title' => 'required',
            'description' => 'required',
            'priority' => 'required',
            'due_date' => 'nullable|date',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'El título es obligatorio.',
            'description.required' => 'La descripción es obligatoria.',
            'priority.required' => 'La prioridad es obligatoria.',
            'due_date.required' => 'La fecha de vencimiento es obligatoria.',
            'due_date.date' => 'La fecha de vencimiento debe ser una fecha válida.',
        ];
    }
}
