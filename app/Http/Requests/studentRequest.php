<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class studentRequest extends FormRequest
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
    public function messages()
    {
        return [
            'first_name.required' => 'dit veld is verplicht',
            'first_name.string' => 'dit is geen text',
            'last_name.required' => 'dit veld is verplicht',
            'last_name.string' => 'dit is geen text',
            'address.required' => 'dit veld is verplicht',
            'address.string' => 'dit is geen text',
            'address.regex' => 'dit is geen geldig adres',
            'city.required' => 'dit veld is verplicht',
            'city.string' => 'dit is geen text',
            'postal_code.required' => 'dit veld is verplicht',
            'postal_code.string' => 'dit is geen text',
            'postal_code.regex' => 'dit is geen geldige postcode',
            'lessons_to_go.required' => 'dit veld is verplicht',
            'lessons_to_go.numeric' => 'dit is geen cijfer' ,
            'email.required' => 'dit veld is verplicht',
            'email.email' =>  'dit is geen email',
            'password.string' => 'dit veld is verplicht',
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
            'first_name' => ['required', 'string'],
            'prefix' => ['sometimes'],
            'last_name' => ['required', 'string'],
            'address' => ['required', 'string', 'regex:/^([1-9][e][\s])*([a-zA-Z]+(([\.][\s])|([\s]))?)+[1-9][0-9]*(([-][1-9][0-9]*)|([\s]?[a-zA-Z]+))?$/i'],
            'city' => ['required', 'string'],
            'postal_code' => ['required', 'string', 'regex:/^[1-9][0-9]{3}[\s]?[A-Za-z]{2}$/i'],
            'lessons_to_go' => ['required', 'numeric'],
            'email' => ['required', 'email'],
            'password' => ['sometimes', 'string'],
        ];
    }
}
