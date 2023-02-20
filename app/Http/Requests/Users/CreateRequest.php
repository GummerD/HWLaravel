<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
            'is_admin' => ['required'],
            'name' => ['required', 'min:3', 'max:30'],
            'email' => ['required', 'min:6','max:50'],
            'password' =>['required', 'min:8','max:100'],
        ];
    }
}
