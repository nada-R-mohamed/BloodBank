<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => 'required|string|min:3|max:100',
            'email' =>'required|email|unique:clients,email',
            'date_of_birth' => 'required|date',
            'blood_type_id' => 'required|integer|exists:blood_types,id',
            'phone' => ['regex:/^01[0125][0-9]{8}$/'],
            'password' => 'required|min:6|confirmed',
            'last_donation_date' => 'required|date',
            'city_id' => 'required|integer|exists:cities,id',
            'device_name' => 'required|string'
        ];

    }
}
