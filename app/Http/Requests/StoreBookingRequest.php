<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

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
                    $validator->errors()->add('token', 'Invalid authentication token');
                }
            }
        });
    }
}
