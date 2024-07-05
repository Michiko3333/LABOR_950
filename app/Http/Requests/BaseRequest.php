<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\noEmoji;

class BaseRequest extends FormRequest
{
    public function withValidator($validator): void
    {
        $rules = [];
        foreach ($this->request as $key => $value) {
            $rules[$key] = new noEmoji;
        }
        $validator->addRules($rules);
    }
}
