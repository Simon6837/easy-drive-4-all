<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class signupRequest extends FormRequest
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

    protected $redirect = '/#signup';

    public function messages()
    {
        return [
            'firstName.required' => 'dit veld is verplicht',
            'firstName.string' => 'alleen tekst toegestaan',
            'lastName.required' => 'dit veld is verplicht',
            'lastName.string' => 'alleen tekst toegestaan',
            'birthDate.required' => 'dit veld is verplicht',
            'birthDate.data' => 'geen geldige datum',
            'phone.required' => 'dit veld is verplicht',
            'phone.numeric' => 'alleen nummers toegestaan',
            'phone.regex' => 'Dit is geen geldig nummer',
            'email.required' => 'dit veld is verplicht',
            'email.email' => 'dit is geen geldige mail',
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
            'firstName' => ['required', 'string'],
            'lastName' => ['required', 'string'],
            'birthDate' => ['required', 'date'],
            'phone' => ['required', 'numeric','regex:/^(((0)[1-9]{2}[0-9][-]?[1-9][0-9]{5})|((\\+31|0|0031)[1-9][0-9][-]?[1-9][0-9]{6}))|(((\\+31|0|0031)6){1}[1-9]{1}[0-9]{7})$/'],
            'email' => ['required', 'email'],
        ];
    }
}
