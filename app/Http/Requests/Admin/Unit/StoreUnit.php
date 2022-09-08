<?php

namespace App\Http\Requests\Admin\Unit;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreUnit extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.unit.create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string'],
            // 'slug' => ['required', Rule::unique('units', 'slug'), 'string'],
            'description' => ['nullable', 'string'],
            'enabled' => ['required', 'boolean'],
            'mcqs' => ['nullable', 'integer'],
            // 'order' => ['required', 'integer'],
            // 'section_id' => ['required', 'integer'],
            'section' => ['required'],

        ];
    }


    public function getSectionId()
    {
        if ($this->has('section')) {
            return $this->get('section')['id'];
        }
        return null;
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
