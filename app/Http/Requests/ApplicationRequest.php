<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApplicationRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name'          => 'required',
            'email'         => 'required|email',
            'phone'         => 'required',
        ];
    }

    public function messages()
    {
        return [
            'required' =>  'Обязательное поле',
            'unique' =>  'Введите уникальный email',
            'email' =>  'Должен быть действующим адресом электронной почты.',
        ];
    }
}
