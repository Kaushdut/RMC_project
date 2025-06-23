<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddUserRequest extends FormRequest
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
            'username'=>['required','string', 'max:50', 'unique:users,username'],
            'name'=>['required','string','max:100'],
            'email'=>['required','email','unique:users,email'],
            'password'=>['required'],
            'phone'=>['digits:10'],
            'observer_id'=>['required_if:role,observer'],
            'station_id'=>['required','exists:stations,id'],
            'stations' => ['required_if:role,multistationuser'],
        ];
    }

    public function messages():array
    {
        return [
            'username.required'=>'Username is required.',
            'username.max'=>'Username cannot exceed 50 characters.',
            'username.unique'=>'This Username already exists.',

            'name.required'=>'Name is required.',
            'name.string'=>'Name must be a valid text.',
            'name.max'=>'Name cannot exceed 100 characters.',

            'email.required'=>'Email is required.',
            'email.email'=>'Enter a valid email address.',
            'email.unique'=>'This email already exists.',

            'password.required'=>'Password is required.',
            'phone.digits'=>'Phone number must have exactly 10 digits.',

            'observer_id.required_if'=>'Observer ID required for Observer.',
            'stations.required_if'=>'Required for Multi Station User.',

            'station_id.required'=>'Station selection is required.',
            'station_id.exists'=>'This station is invalid or does not exist.',
        ];
    }

}
