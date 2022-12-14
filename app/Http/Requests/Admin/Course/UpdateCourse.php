<?php

namespace App\Http\Requests\Admin\Course;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateCourse extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.course.edit', $this->course);
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
            'title' => ['sometimes', 'string'],
            'slug' => ['sometimes', Rule::unique('courses', 'slug')->ignore($this->course->getKey(), $this->course->getKeyName()), 'string'],
            'text' => ['nullable', 'string'],
            'image' => ['nullable', 'string'],
            'body' => ['nullable', 'string'],
            'duration' => ['nullable', 'string'],
            'price' => ['nullable', 'numeric'],
            'is_visible' => ['sometimes', 'boolean'],
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
