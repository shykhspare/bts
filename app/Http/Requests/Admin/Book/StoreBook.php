<?php

namespace App\Http\Requests\Admin\Book;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreBook extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.book.create');
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
            'description' => ['nullable', 'string'],
            'publisher' => ['nullable', 'string'],
            'language' => ['required', 'string'],
            'author' => ['required'],
            'enabled' => ['required', 'boolean'],
            'price' => ['required', 'numeric'],
            'category' => ['required'],
            'is_hard' => ['nullable', 'boolean'],
            'status' => ['required', 'numeric'],
            'online_amount' => ['required', 'numeric'],
            'ship_amount' => ['required', 'numeric'],
            'orderNo' => ['nullable', 'numeric'],
        ];
    }


    public function getCategoryId()
    {
        if ($this->has('category')) {
            return $this->get('category')['id'];
        }
        return null;
    }


    public function getAuthorId()
    {
        if ($this->has('author')) {
            return $this->get('author')['id'];
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
