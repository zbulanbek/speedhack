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

class Question extends Model implements HasMedia
{
    use HasFactory;
    use ProcessMediaTrait;
    use AutoProcessMediaTrait;
    use HasMediaCollectionsTrait;
    use HasMediaThumbsTrait;

    protected $fillable = [
        'question',
        'answer',
        'point',
        'task_id',
        'options',
        'topic_block_id'
    ];

    protected $appends = ['image_url', 'correct_user_answers'];

    public function variants()
    {
        return $this->hasMany(QuestionOption::class, 'question_id', 'id');
    }

    public function correct_options()
    {
        return $this->hasMany(QuestionOption::class, 'question_id', 'id')->where('correct', 1);
    }

    public function answers()
    {
        return $this->hasMany(UserQuestionAnswer::class, 'question_id', 'id');
    }

    public function getCorrectUserAnswersAttribute()
    {
        return $this->answers()
            ->where('user_id', auth('sanctum')->user()->id)
            ->where('is_correct', 1)
            ->with('questionOption')
            ->get();
    }

    /* ************************ Media ************************* */

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
