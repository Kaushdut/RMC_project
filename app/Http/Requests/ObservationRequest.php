<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ObservationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->user()->role === 'observer';
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'observation_date' => ['required','date','before_or_equal:today',
            Rule::unique('observation')->where(function ($query) {
                return $query->where('station_id', $this->station_id);
            })
        ],
            'rainfall'=>['required','numeric','min:0','max:999.9','regex:/^\d{1,3}(\.\d)?$/'],       
        ];
    }
    public function messages():array
    {
        return[
            'rainfall.required'=>'Rainfall value required.',
            'rainfall.numeric'=>'Rainfall must be a valid number.',
            'rainfall.min'=>'Rainfall cannot be less than 0.',
            'rainfall.max'=>'Rainfall seems too high.Please recheck.',
            'rainfall.regex'=>'Value can have at most 1 decimal place only.',
            'observation_date.before_or_equal' => 'Cannot record for future date.',
            'observation_date.unique'=>'Observation already recorded for this date.'
        ];
    }
}
