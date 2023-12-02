<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "gmail" => ["email:filter", "required"],
            "passwords" => ["required", Password::min(8)->letters()->mixedCase()->numbers()->symbols()->uncompromised()]
        ];
    }

    public function messages()
    {
        return [

        ];
    }

    public function attribute()
    {
        return [

        ];
    }
}