<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class noEmoji implements ValidationRule
{
    public static $pattern = '/[\xF0-\xF7][\x80-\xBF][\x80-\xBF][\x80-\xBF]/';

    public static function isEmoji($value)
    {
        if (preg_match(self::$pattern, $value)) return true;
        else return false;
    }

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {

        if (gettype($value) == "string" && !is_numeric($value)) {
            if (preg_match(self::$pattern, $value)) {
                $fail('絵文字の入力は許可されていません');
            }
        }
    }
}
