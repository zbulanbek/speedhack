<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
        'surname',
        'patronymic',
        'city',
        'role_id',
        'birth_day',
        'purpose',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
        'full_name'
    ];

    public function getFullNameAttribute()
    {
        $fullName = [];
        if ($this->surname) $fullName[] = $this->surname;
        if ($this->name) $fullName[] = $this->name;
        if ($this->patronymic) $fullName[] = $this->patronymic;

        return implode(" ", $fullName);
    }


    public function balls()
    {
        return $this->belongsToMany(Question::class, 'student_balls', 'student_id', 'question_id');
    }

    public function lesson_ball()
    {
        return $this->belongsToMany(Lesson::class, 'student_lesson_ball', 'student_id', 'lesson_id');
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'student_courses', 'student_id', 'course_id', 'id');
    }

    public function materials()
    {
        return $this->belongsToMany(Material::class, 'student_materials', 'student_id', 'material_id');
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function student_timetables()
    {
        return $this->hasMany(Timetable::class, 'student_id');
    }

    public function teacher_timetables()
    {
        return $this->hasMany(Timetable::class, 'teacher_id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'user_id');
    }

    public function methodist_orders()
    {
        return $this->hasMany(Order::class, 'methodist_id');
    }
}
