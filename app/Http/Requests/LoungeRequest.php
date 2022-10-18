<?php

namespace App\Http\Requests;

use Anik\Form\FormRequest;

class LoungeRequest extends FormRequest
{
    protected function rules(): array
    {
        return [
            'campu_id'                          => 'required|exists:campus,id',
            'lounge'                            => 'required|string',
            'description'                       => 'required|string'
        ];
    }
}
