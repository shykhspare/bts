<?php

namespace App\Http\Requests\Admin\OrderHd;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreOrderHd extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.order-hd.create');
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
            'status' => ['required', 'integer'],
            'user_id' => ['required', 'string'],
            'name' => ['required', 'string'],
            'email' => ['required', 'email', 'string'],
            'phoneno' => ['required', 'string'],
            'address' => ['required', 'string'],
            'company' => ['nullable', 'string'],
            'amount' => ['nullable', 'integer'],
            'orderNo' => ['nullable', 'string'],
            'expired_at' => ['nullable', 'date'],
            'city' => ['nullable', 'string'],
            'state' => ['nullable', 'string'],
            'zip' => ['nullable', 'string'],
            'note' => ['nullable', 'string'],
            'paid' => ['required', 'boolean'],
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
