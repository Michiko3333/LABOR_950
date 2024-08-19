<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class NumberOnly implements ValidationRule
{
    public $maxLength;
    public static $attributes = [];

    public function __construct($maxLength = false)
    {
        $this->maxLength = $maxLength;
    }
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $pattern = '/\A[0-9]+\z/u';
        $length = strlen($value);

        $attribute = self::$attributes[$attribute] ?? $attribute;

        if (!preg_match($pattern, $value)) {
            $fail("{$attribute}は正しい形式ではありません。");
        } elseif ($this->maxLength && $length > $this->maxLength) {
            $fail("{$attribute}は{$this->maxLength}桁以下で入力してください。");
        }
    }
}
