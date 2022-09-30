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

class HomeWork extends Model implements HasMedia
{
    use HasFactory;
    use ProcessMediaTrait;
    use AutoProcessMediaTrait;
    use HasMediaCollectionsTrait;
    use HasMediaThumbsTrait;

    protected $fillable = [
        'name',
        'lesson_id'
    ];

    protected $appends = ['image_url'];

    /* ************************ Relations ************************* */

    public function tasks()
    {
        return $this->belongsToMany(Task::class, 'homework_task', 'homework_id', 'task_id');
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
