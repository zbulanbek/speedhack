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

class QuestionOption extends Model  implements HasMedia
{
    use HasFactory;
    use ProcessMediaTrait;
    use AutoProcessMediaTrait;
    use HasMediaCollectionsTrait;
    use HasMediaThumbsTrait;

    protected $fillable = [
        'options_text',
        'question_id',
        'explanation',
        'removed_index',
        'correct',
    ];

    protected $appends = ['image_url'];

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
        return $this->getFirstMediaUrl('image') ?: asset('images/logo.png');
    }
}
