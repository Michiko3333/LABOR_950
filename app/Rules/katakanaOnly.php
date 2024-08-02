<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class katakanaOnly implements ValidationRule
{
    public $address;
    public static $attributes = [];

    public function __construct($address = false)
    {
        $this->address = $address;
    }
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $pattern = $this->address
            ? '/^[ァ-ヴーa-zａ-ｚA-ZＡ-Ｚ0-9０-９ 　－]+$/u'
            : '/\A[ァ-ヴー]+\z/u';

        $attribute = self::$attributes[$attribute] ?? $attribute;

        if (!preg_match($pattern, $value)) {
            $fail("{$attribute}は正しい形式ではありません。");
        }
    }
}
