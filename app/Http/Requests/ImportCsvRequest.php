<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImportCsvRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'files' => ['required', 'array'],
            'files.*' => ['file', 'mimes:csv,txt', 'max:30720'], // max 30MB per file
        ];
    }
}
