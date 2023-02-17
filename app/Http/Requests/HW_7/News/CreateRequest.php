<?php

namespace App\Http\Requests\HW_7\News;

use App\Enumus\NewsStatusEnum;
use Illuminate\Validation\Rules\Enum;
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
        return  [
            'category_ids' => ['required', 'array', ] ,
            'category_ids.*' => ['exists:h_w__categories,id'],
            'title' => ['required', 'min:5', 'max:200'],
            'author' => ['nullable', 'string', 'min:2', 'max:30' ],
            'status' => ['required', new Enum(NewsStatusEnum::class)],
            'image' => ['sometimes'],
            'description' => ['nullable', 'string'],
    
        ];
    }

    public function getCategoryIds(): array
    {
        return (array) $this->validated('category_ids');
    }
}
