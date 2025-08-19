<?php

namespace App\Rules;

use Closure;
use ReCaptcha\ReCaptcha;
use Illuminate\Contracts\Validation\ValidationRule;

class Captcha implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @param  \Closure(string): void  $fail
     * @return void
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $recaptcha = new ReCaptcha(env('CAPTCHA_SECRET'));
        $response = $recaptcha->verify($value, request()->ip());

        if (!$response->isSuccess()) {
            $fail('Please check code Captcha.');
        }
    }
}
