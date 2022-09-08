<?php

namespace App\Http\Requests\Admin\Section;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateSection extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.section.edit', $this->section);
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
            // 'slug' => ['sometimes', Rule::unique('sections', 'slug')->ignore($this->section->getKey(), $this->section->getKeyName()), 'string'],
            'description' => ['nullable', 'string'],
            'language' => ['sometimes', 'string'],
            'enabled' => ['sometimes', 'boolean'],
            'mcqs' => ['nullable', 'integer'],
            'hassection' => ['sometimes', 'boolean'],
            // 'author_id' => ['nullable', 'integer'],
            // 'category_id' => ['nullable', 'integer'],
            // 'book_id' => ['required', 'integer'],
            'book' => ['required'],
            'section' => ['sometimes'],
        ];
    }


    public function getBookId()
    {
        if ($this->has('book')) {
            return $this->get('book')['id'];
        }
        return null;
    }


    public function getSectionId()
    {
        if ($this->has('section') && !empty($this->get('section'))) {
            return $this->get('section')['id'];
        }
        return null;
    }

    // public function getSections(): array
    // {
    //     if ($this->has('sections')) {
    //         $sections = $this->get('sections');
    //         return array_column($sections, 'id');
    //     }
    //     return [];
    // }
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
