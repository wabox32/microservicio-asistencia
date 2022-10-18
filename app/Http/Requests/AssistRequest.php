<?php

namespace App\Http\Requests;

use Anik\Form\FormRequest;

class AssistRequest extends FormRequest
{
    protected function rules(): array
    {
        return [
            'lounge_id'                              => 'required|exists:lounges,id',
            'matter_id'                              => 'required|exists:matters,id',
            'studient_id'                            => 'required|exists:studients,id',
            'code_user'                              => 'required'
        ];
    }
}
