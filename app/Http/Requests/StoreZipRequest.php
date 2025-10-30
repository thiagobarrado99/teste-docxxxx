<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreZipRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'to_postcode' => ['required', 'string'],
            'from_postcode' => ['required', 'string'],
            'to_weight' => ['required', 'decimal:0,3'],
            'from_weight' => ['required', 'decimal:0,3'],
            'cost' => ['required', 'string'],
            'user_id' => ['required', 'integer', 'exists:users,id'],
            'branch_id' => ['required', 'integer']
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'to_postcode' => $this->unmask($this->to_postcode),
            'from_postcode' => $this->unmask($this->from_postcode),
            'cost' => money_unformat($this->cost),
            'user_id' => Auth::user()->id
        ]);
    }

    private function unmask(?string $value): ?string
    {
        return $value ? preg_replace('/\D/', '', $value) : null;
    }
}
