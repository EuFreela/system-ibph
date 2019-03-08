<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class AlphaNumPointRules implements Rule
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
        return preg_match('~^[[:alnum:].]+$~u', $value) ? true : false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'O :attribute está incorreto. Use apenas letras, números e ponto';
    }
}
