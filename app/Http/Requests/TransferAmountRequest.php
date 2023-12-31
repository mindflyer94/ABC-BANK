<?php

namespace App\Http\Requests;

use App\Rules\DifferentFromAuthUserEmailRule;
use App\Rules\withdrawDepositeRule;
use Illuminate\Foundation\Http\FormRequest;

class TransferAmountRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'email' => [
                'required',
                'exists:users,email',
                new DifferentFromAuthUserEmailRule,
            ],
           'amount' => ['required',new withdrawDepositeRule],
        ];
    }
}
