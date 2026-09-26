<?php
namespace App\Http\Request;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateActivityRequest extends FormRequest
{
    public function authorize(): bool
    {
        // Ubah menjadi true agar request diizinkan untuk diproses
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'min:5', 'max:100'],
            'description' => ['nullable', 'string', 'max:1000'],
            'activity_date' => ['required', 'date'],
            'category' => ['required', 'string', 'max:50'],
            'status' => [
                Rule::in(['Planned', 'Ongoing', 'Done']),
                'required',
            ],
        ];
    }
}