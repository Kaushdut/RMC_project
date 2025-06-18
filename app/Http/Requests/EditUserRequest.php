<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check() && auth()->user()->role === 'admin';
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'username'=>['required','string', 'max:50'],
            'email'=>['required','email'],
            'password'=>['required'],
            'phone'=>['digits:10'],
            'observer_id'=>['required_if:role,observer','numeric'],
            'station_id'=>['required','exists:stations,id'],           
        ];
    }

    public function messages():array
    {
        return [
            'username.required'=>'Username is required.',
            'username.max'=>'Username cannot exceed 50 characters.',

            'email.required'=>'Email is required.',
            'email.email'=>'Enter a valid email address.',

            'password.required'=>'Password is required.',
            'phone.digits'=>'Phone number must have exactly 10 digits.',

            'observer_id.required_if'=>'Observer ID required for Observer.',
            'observer_id.numeric'=>'ID should be a number.',

            'station_id.required'=>'Station selection is required.',
            'station_id.exists'=>'This station is invalid or does not exist.',
        ];
    }

    public function withValidator($validator)
    {
    $validator->after(function ($validator) {
        $role = $this->input('role');
        $observer_id = $this->input('observer_id');

        //If role is NOT observer but observer_id is filled, throw error
        if ($role !== 'observer' && !empty($observer_id)) {
            $validator->errors()->add('observer_id', 'Observer ID must only be filled for Observer.');
        }
    });
    }
}
