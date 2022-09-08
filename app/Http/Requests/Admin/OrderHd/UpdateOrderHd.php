<?php

namespace App\Http\Requests\Admin\OrderHd;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateOrderHd extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.order-hd.edit', $this->orderHd);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'session_id' => ['nullable', 'string'],
            'status' => ['sometimes', 'integer'],
            'user_id' => ['sometimes', 'integer'],
            'name' => ['sometimes', 'string'],
            'email' => ['sometimes', 'email', 'string'],
            'phoneno' => ['sometimes', 'string'],
            'orderNo' => ['nullable', 'string'],
            'note' => ['nullable', 'string'],
            'paid' => ['sometimes', 'boolean'],
            'payment_method' => ['nullable', 'string'],
            'transaction_no' => ['nullable', 'string'],
            'transaction_attachment' => ['nullable', 'string'],

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
