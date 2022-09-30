<?php

namespace App\Http\Requests\Admin\Mode;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreMode extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.mode.create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'user_id' => ['nullable', 'string'],
            'monday' => ['nullable', 'string'],
            'tuesday' => ['nullable', 'string'],
            'wednesday' => ['nullable', 'string'],
            'thursday' => ['nullable', 'string'],
            'friday' => ['nullable', 'string'],
            'saturday' => ['nullable', 'string'],
            'sunday' => ['nullable', 'string'],
            
        ];
    }

    /**
    * Modify input data
    *
    * @return array
    */
    public function getSanitized(): array
    {
        $sanitized = $this->validated();

        //Add your code for manipulation with request data here

        return $sanitized;
    }
}
