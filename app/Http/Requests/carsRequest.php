<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class carsRequest extends FormRequest
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
     * Custom error messages
     *
     * @return string[]
     */
    public function messages()
    {
        return [
            'type.required' => 'Het toevoegen van een type is verplicht',
            'brand.required' => 'Het toevoegen van een merk is verplicht',
            'model.required' => 'Het toevoegen van een model is verplicht',
            'licence_plate.required' => 'Het toevoegen van een kenteken is verplicht',
            'licence_plate.max' => 'Dit kenteken is te lang',
            'licence_plate.regex' => 'Dit is geen geldig Nederlands kenteken',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'type' => 'required',
            'brand' => 'required',
            'model' => 'required',
            'license_plate' => ['required', 'max:9','regex:/(([0-9]{2}|[a-zA-Z]{2})[-]([0-9]{2}|[a-zA-Z]{2})-([0-9]{2}|[a-zA-Z]{2}))|(([0-9]{1}|[a-zA-Z]{1})-([0-9]{3}|[a-zA-Z]{3})-([0-9]{2}|[a-zA-Z]{2}))|(([0-9]{2}|[a-zA-Z]{2})-([0-9]{3}|[a-zA-Z]{3})-([0-9]{1}|[a-zA-Z]{1}))|(([0-9]{3}|[a-zA-Z]{3})-([0-9]{2}|[a-zA-Z]{2})-([0-9]{1}|[a-zA-Z]{1}))/'],
        ];
    }
}
