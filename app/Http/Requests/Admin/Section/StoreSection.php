<?php

namespace App\Http\Requests\Admin\Section;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreSection extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.section.create');
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
            // 'slug' => ['required', Rule::unique('sections', 'slug'), 'string'],
            'description' => ['nullable', 'string'],
            'language' => ['required', 'string'],
            'enabled' => ['sometimes', 'boolean'],
            'mcqs' => ['nullable', 'integer'],
            // 'author_id' => ['nullable', 'integer'],
            // 'category_id' => ['nullable', 'integer'],
            // 'book_id' => ['required', 'integer'],
            'hassection' => ['nullable', 'boolean'],
            'book' => ['required'],
            'section' => ['nullable'],

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
        if ($this->has('section')) {
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
