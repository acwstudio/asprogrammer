<?php

namespace App\Rules;

use Crypt;
use Illuminate\Contracts\Validation\Rule;

/**
 * Class HoneypotRule
 *
 * @package App\Rules
 */
class HoneypotRule implements Rule
{
    public $lifeCycle;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($lifeCycle)
    {
        $this->lifeCycle = $lifeCycle;
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
        $value = Crypt::decrypt($value);
        if (time() - $value <= $this->lifeCycle) {
            return false;
        }
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'This email has sent a bot or a very fast man.';
    }
}
