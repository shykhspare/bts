<?php

namespace App\Http\Requests\Admin\Question;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateQuestion extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.question.edit', $this->question);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'question' => ['nullable', 'string'],
            'q_attachment' => ['nullable', 'string'],
            'answer' => ['nullable', 'string'],
            'a_attachment' => ['nullable', 'string'],
            'order' => ['nullable', 'integer'],
            'type' => ['sometimes', 'string'],
            'link' => ['nullable', 'string'],
            // 'unit_id' => ['required', 'integer'],
            'unit' => ['required'],

        ];
    }


    public function getUnitId()
    {
        if ($this->has('unit')) {
            return $this->get('unit')['id'];
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
