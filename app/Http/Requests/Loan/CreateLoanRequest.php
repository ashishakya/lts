<?php

namespace App\Http\Requests\Loan;

use Illuminate\Foundation\Http\FormRequest;

class CreateLoanRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            //
            'type'  => 'required|min:3',
            'rate'  => 'required|numeric|min:1',
        ];
    }
}
