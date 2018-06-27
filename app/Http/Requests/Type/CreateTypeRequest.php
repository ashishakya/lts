<?php

namespace App\Http\Requests\Type;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\Type\UniqueName;

class CreateTypeRequest extends FormRequest
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
            'name' => ['required','unique:types,name',new UniqueName], //case insensitive problem
            'rate' => 'required|numeric'
        ];
    }
}
