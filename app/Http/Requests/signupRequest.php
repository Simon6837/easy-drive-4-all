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
            'phone' => ['required', 'numeric'],
            'email' => ['required', 'email'],
        ];
    }
}
