<?php

namespace App\Http\Requests\Admin\Question;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreQuestion extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.question.create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'description' => ['nullable', 'string'],
            'answer' => ['nullable', 'string'],
            'marks' => ['nullable', 'integer'],
            'order' => ['nullable', 'integer'],
            'type' => ['required', 'string'],
            'link' => ['nullable', 'string'],
            'paid' => ['required', 'boolean'],
            'explanation' => ['nullable', 'string'],
            'unit' => ['nullable'],
            'test_id' => ['nullable'],
        ];
    }


    public function getUnitId()
    {
        if ($this->has('unit')) {
            return $this->get('unit')['id'];
        }
        return 0;
    }


    /**
     * Modify input data
     *
     * @return array
     */
    public function getSanitized(): array
    {
        $sanitized = $this->validated();

        //Add your code for manipulation with request data here

        return $sanitized;
    }
}
