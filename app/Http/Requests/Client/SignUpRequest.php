<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class SignUpRequest extends FormRequest
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
            "firstname" => ["required", "string"],
            "lastname" => ["required", "string"],
            "emails" => ["required", "email"],
            "password" => ['required', Password::min(8)->letters()->mixedCase()->numbers()->symbols()->uncompromised()],
            "password_same" => ['required', 'same:password'],
            "date" => ["required"],
            "gender" => ["required"],
            "cid" => ["required"],
            "phone" => ["required"],
            "address" => ["required"],

        ];
    }
}