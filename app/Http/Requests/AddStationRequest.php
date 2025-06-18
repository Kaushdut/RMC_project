<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddStationRequest extends FormRequest
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
            'id' => ['required', 'integer', 'unique:stations,id'],
            'station_name' => ['required', 'string', 'max:100','unique:stations,station_name'],
            'district' => ['required', 'string', 'max:100'],
            'latitude' => ['required','between:-90,90'],    //'numeric',
            'longitude' => ['required', 'between:-180,180'] //'numeric', 
        ];
    }

    public function messages():array
    {
        return[
            'id.required'=>'Station ID is required.',
            'id.integer'=>'Station ID must be an integer.',
            'id.unique'=>'This Station ID already exists.',

            'station_name.required'=>'Station Name is required.',
            'station_name.string'=>'Station Name must be a valid text.',
            'station_name.max'=>'Station Name cannot exceed 100 characters.',
            'station_name.unique'=>'This Station Name already exists.',

            'district.required'=>'District Name is required.',
            'district.string'=>'District Name must be a valid text.',
            'district.max'=>'District Name cannot exceed 100 characters.',

            'latitude.required'=>'Station Latitude is required.',
            'latitude.between'=>'Latitude must be between -90 and 90 degrees.',
            //'latitude.numeric' => 'Latitude must be a number.',

            'longitude.required'=>'Station Longitude is required.',
            'longitude.between'=>'Longitude must be between -180 and 180 degrees.',  
            //'longitude.numeric' => 'Longitude must be a number.',          
        ];
    }
}
