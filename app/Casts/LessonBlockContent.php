<?php

namespace App\Casts;

use App\Models\Task;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class LessonBlockContent implements CastsAttributes
{
    /**
     * Cast the given value.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @param  string  $key
     * @param  mixed  $value
     * @param  array  $attributes
     * @return mixed
     */
    public function get($model, $key, $value, $attributes)
    {
        $content = json_decode($value, true);
        if ($content) {
            foreach ($content as $key => $item) {
                if (isset($item['task_id'])) {
                    $task = Task::where('id', $item['task_id'])->with('questions', 'questions.variants', 'questions.correct_options')->first();
                    if ($task) {
                        $content[$key]['task'] = $task;
                    }
                }
            }
        }
        return $content;
    }

    /**
     * Prepare the given value for storage.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @param  string  $key
     * @param  mixed  $value
     * @param  array  $attributes
     * @return mixed
     */
    public function set($model, $key, $value, $attributes)
    {
        return json_encode($value);
    }
}
