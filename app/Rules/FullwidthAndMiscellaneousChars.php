<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class FullwidthAndMiscellaneousChars implements ValidationRule
{
    public $includeNewlines;
    public static $attributes = [];

    public function __construct($includeNewlines = true)
    {
        $this->includeNewlines = $includeNewlines;
    }
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $pattern = $this->includeNewlines
            ? '/^[\x{0020}-\x{007F}\x{FF01}-\x{FF5E}\x{3000}-\x{303F}\x{3040}-\x{309F}\x{30A0}-\x{30FF}\x{4E00}-\x{9FAF}\n\t]+$/u'
            : '/^[\x{0020}-\x{007F}\x{FF01}-\x{FF5E}\x{3000}-\x{303F}\x{3040}-\x{309F}\x{30A0}-\x{30FF}\x{4E00}-\x{9FAF}\t]+$/u';

            $attribute = self::$attributes[$attribute] ?? $attribute;

            if (!preg_match($pattern, $value)) {
                $fail("{$attribute}は正しい形式ではありません。");
            }
    }
}
