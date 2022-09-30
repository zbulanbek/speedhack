<?php

namespace App\Http\Requests\Admin\Course;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreCourse extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.course.create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'author_id' => ['nullable', 'integer'],
            'title' => ['required', 'string'],
            'slug' => ['required', Rule::unique('courses', 'slug'), 'string'],
            'text' => ['nullable', 'string'],
            'image' => ['nullable', 'string'],
            'body' => ['nullable', 'string'],
            'duration' => ['nullable', 'string'],
            'price' => ['nullable', 'numeric'],
            'is_visible' => ['required', 'boolean'],
            'course_category_id' => ['nullable',],
            
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
