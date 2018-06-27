<?php

namespace App\Rules\Type;

use Illuminate\Contracts\Validation\Rule;

class UniqueName implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        //
        dd($attribute,$value);
        if($value == ucwords($value) )
           return false;

    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The name has already been taken.';
    }
}