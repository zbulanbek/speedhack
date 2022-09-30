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

class Lesson extends Model implements HasMedia
{
    use HasFactory;
    use ProcessMediaTrait;
    use AutoProcessMediaTrait;
    use HasMediaCollectionsTrait;
    use HasMediaThumbsTrait;

    protected $fillable = [
        'title',
        'min',
        'course_section_id',
        'level',
        'description',
    ];
    protected $appends = [
        'resource_url',
        'video',
        'materials'
    ];

    public function getResourceUrlAttribute()
    {
        return url('/admin/lessons/' . $this->getKey());
    }

    public function courseSection()
    {
        return $this->belongsTo(CourseSection::class);
    }

    public function materials()
    {
        return $this->hasMany(Material::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class, 'lesson_id', 'id');
    }

    public function topics()
    {
        return $this->hasMany(Topic::class, 'lesson_id', 'id');
    }

    public function timeLines()
    {
        return $this->hasMany(LessonTimeLine::class, 'lesson_id', 'id');
    }

    public function homeWorks()
    {
        return $this->hasMany(HomeWork::class, 'lesson_id');
    }

    public function timetables()
    {
        return $this->hasMany(Timetable::class, 'lesson_id');
    }

    /* ************************ Media ************************* */

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('materials')
            ->accepts('application/pdf')
            ->maxFilesize(20 * 1024 * 1024)
            ->useDisk('public');

        $this->addMediaCollection('video')
            ->accepts('video/*')
            ->maxFilesize(2000 * 1024 * 1024)
            ->maxNumberOfFiles(1)
            ->useDisk('public');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->autoRegisterThumb200();
    }

    public function getVideoAttribute()
    {
        return $this->getFirstMediaUrl('video') ?: null;
    }

    public function getMaterialsAttribute()
    {
        $media = $this->getMedia('materials');
        $materials = [];
        foreach ($media as $item) {
            $materials[] = [
                'url' => $item->getUrl(),
                'name' => $item->getCustomProperty('file_name')
            ];
        }
        return $materials;
    }
}
