<?php

namespace App\Http\Requests\Webinar;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class WebinarStore extends FormRequest
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

    protected function prepareForValidation()
    {
        $this->merge([
            'room_name' => Str::uuid(),
            'user_id' => auth()->id()
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'room_name' => ['required'],
            'user_id' => ['required', 'integer'],
            'course_id' => ['required', 'integer'],
        ];
    }
}
