<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class noSymbol implements ValidationRule
{
    public $newLine;
    public static $attributes = [];

    public function __construct($newLine = false)
    {
        $this->newLine = $newLine;
    }
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $pattern = $this->newLine
            ? '/^[ぁ-んァ-ヴー一-龥々a-zａ-ｚA-ZＡ-Ｚ0-9０-９ 　－\n\r]+$/u'
            : '/^[ぁ-んァ-ヴー一-龥々a-zａ-ｚA-ZＡ-Ｚ0-9０-９ 　－]+$/u';

            $attribute = self::$attributes[$attribute] ?? $attribute;

            if (!preg_match($pattern, $value)) {
                $fail("{$attribute}は正しい形式ではありません。");
            }
    }
}
