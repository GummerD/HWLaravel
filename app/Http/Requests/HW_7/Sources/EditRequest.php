<?php

namespace App\Http\Requests\HW_7\Sources;

use Illuminate\Foundation\Http\FormRequest;

class EditRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'source_name' => ['required', 'min:2', 'max:50'],
            'source_url' => ['required', 'min:10', 'max:50'],
        ];
    }
}
