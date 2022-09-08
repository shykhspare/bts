<?php

namespace App\Http\Requests\Admin\Test;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateTest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.test.edit', $this->test);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'title' => ['sometimes', 'string'],
            // 'slug' => ['sometimes', Rule::unique('tests', 'slug')->ignore($this->test->getKey(), $this->test->getKeyName()), 'string'],
            'description' => ['nullable', 'string'],
            'language' => ['sometimes', 'string'],
            'enabled' => ['sometimes', 'boolean'],
            'price' => ['sometimes', 'numeric'],
            'date' => ['nullable', 'date'],
            'announce_date' => ['nullable', 'date'],
            'last_date' => ['nullable', 'date'],

        ];
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
