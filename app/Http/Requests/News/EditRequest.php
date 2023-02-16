<?php

namespace App\Http\Requests\News;

use App\Enumus\NewsStatusEnum;
use Illuminate\Validation\Rules\Enum;
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
            'category_ids' => ['required', 'array', ] ,
            'category_ids.*' => ['exists:categories,id'],
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

    public function attributes(): array // можно переопределить метод из родителя, чтобы при ошибках были необходимые названия
    {
        return [
            'title' => 'название новости/заголовок',
        ];
    }
    public function messages(): array // можно переопределить метод из родителя, чтобы при ошибках были необходимые названия
    {
        return [
            'recuared' => 'Нкжно заполнить поле :attribute',
        ];
    }
}
