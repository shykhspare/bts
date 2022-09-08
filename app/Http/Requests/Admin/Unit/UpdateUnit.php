<?php

namespace App\Http\Requests\Admin\Unit;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateUnit extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.unit.edit', $this->unit);
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
            // 'slug' => ['sometimes', Rule::unique('units', 'slug')->ignore($this->unit->getKey(), $this->unit->getKeyName()), 'string'],
            'description' => ['nullable', 'string'],
            'enabled' => ['sometimes', 'boolean'],
            'mcqs' => ['nullable', 'integer'],
            // 'order' => ['sometimes', 'integer'],
            // 'section_id' => ['sometimes', 'integer'],
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
