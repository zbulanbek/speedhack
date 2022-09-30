<?php

namespace App\Models;

use Brackets\Media\HasMedia\AutoProcessMediaTrait;
use Brackets\Media\HasMedia\HasMediaCollectionsTrait;
use Brackets\Media\HasMedia\HasMediaThumbsTrait;
use Brackets\Media\HasMedia\ProcessMediaTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Task extends Model implements HasMedia
{
    use HasFactory;
    use ProcessMediaTrait;
    use AutoProcessMediaTrait;
    use HasMediaCollectionsTrait;
    use HasMediaThumbsTrait;

    protected $fillable = ['name', 'lesson_id', 'type'];

    protected $appends = ['image_url', 'score'];

    public function questions()
    {
        return $this->hasMany(Question::class);
    }


    public function all_questions()
    {
        return $this->hasMany(Question::class);
    }

    public function correctOptions()
    {
        return $this->hasManyThrough(QuestionOption::class, Question::class)->where('correct', true);
    }

    public function correctUserQuestionAnswers()
    {
        return $this->hasManyThrough(UserQuestionAnswer::class, Question::class)
            ->where('user_id', auth('sanctum')->user()->id)
            ->where('is_correct', 1);
    }


    public function getScoreAttribute()
    {
        return $this->correctUserQuestionAnswers->sum('point') ?: 0;
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->autoRegisterThumb200();
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('image')
            ->accepts('image/*')
            ->maxNumberOfFiles(1);
    }

    public function getImageUrlAttribute()
    {
        return $this->getFirstMediaUrl('image') ?: '';
    }
}
