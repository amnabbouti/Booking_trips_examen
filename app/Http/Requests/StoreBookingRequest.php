<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;
use App\Constants\ResponseMessages;

class StoreBookingRequest extends FormRequest
{
    /**
     * everyone can make a booking request
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * basic validations
     */
    public function rules(): array
    {
        return [
            'trip_id' => 'required|exists:trips,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'number_of_people' => 'required|integer|min:1',
            'token' => 'required|string'
        ];
    }

    /**
     * check if the token matches what we expect
     * token should be md5(email + 'canadarocks')
     */
    public function withValidator(Validator $validator): void
    {
        $validator->after(function ($validator) {
            $email = $this->input('email');
            $token = $this->input('token');

            if ($email && $token) {
                $expectedToken = md5($email . 'canadarocks');

                if ($token !== $expectedToken) {
                    $validator->errors()->add('token', ResponseMessages::TOKEN_INVALID);
                }
            }
        });
    }

    /**
     * error messages for validation (thanks to laravel developers for this great feature, php is more fun than i thought!)
     */
    public function messages(): array
    {
        return [
            'trip_id.exists' => ResponseMessages::TRIP_NOT_FOUND,
            'number_of_people.min' => ResponseMessages::MIN_PEOPLE,
            'token.required' => ResponseMessages::TOKEN_REQUIRED
        ];
    }
}
