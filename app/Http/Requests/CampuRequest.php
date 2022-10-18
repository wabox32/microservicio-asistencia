<?php

namespace App\Http\Requests;

use Anik\Form\FormRequest;

class CampuRequest extends FormRequest
{
    protected function rules(): array
    {
        return [
            'name'                              => 'required|string',
            'description'                       => 'required|string'
        ];
    }
}
