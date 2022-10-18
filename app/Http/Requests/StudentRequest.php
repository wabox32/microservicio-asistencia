<?php

namespace App\Http\Requests;

use Anik\Form\FormRequest;

class StudentRequest extends FormRequest
{
    protected function rules(): array
    {
        return [
            'name'                              => 'required|string',
            'identification_number'             => 'required|string',
            'type_identification'               =>  'required|string'
        ];
    }
}
