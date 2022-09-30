<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
use App\Models\{User};
use Auth;

class StudentPasswordUpdateRequest extends FormRequest
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
        //$user = User::find(Auth::id());
        return [
            'old_password' => 'required',
            'new_password'  => 'required|min:6',
            'repeat_password' => 'required|same:new_password',
        ];

        // if (Hash::check($request->old_password, $user->password)) { 
        //     return $request->session()->flash('error', 'Password does not match');
        // }
    }

    public function messages()
    {
        return [
            'required' =>  'Обязательное поле',
            'same' => 'Пароли не совпадают',
            'min' => 'Должен состоять не менее чем из 6 символов.'
        ];
    }
}
