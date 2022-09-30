<?php

/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Brackets\AdminAuth\Models\AdminUser::class, function (Faker\Generator $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->email,
        'password' => bcrypt($faker->password),
        'remember_token' => null,
        'activated' => true,
        'forbidden' => $faker->boolean(),
        'language' => 'en',
        'deleted_at' => null,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        'last_login_at' => $faker->dateTime,

    ];
});/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Application::class, static function (Faker\Generator $faker) {
    return [


    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Application::class, static function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName,
        'phone' => $faker->sentence,
        'email' => $faker->email,
        'status_id' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,


    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */

$factory->define(App\Models\Material::class, static function (Faker\Generator $faker) {
    return [

$factory->define(App\Models\TeacherSlider::class, static function (Faker\Generator $faker) {
    return [
        'category' => $faker->sentence,
        'color' => $faker->sentence,
        'image' => $faker->text(),
        'course' => $faker->sentence,
        'name' => $faker->firstName,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,


    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\TabCourse::class, static function (Faker\Generator $faker) {
    return [


    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\TabCourse::class, static function (Faker\Generator $faker) {
    return [
        'title' => $faker->sentence,
        'title_image' => $faker->text(),
        'body' => $faker->text(),
        'image' => $faker->text(),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,


    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Setting::class, static function (Faker\Generator $faker) {
    return [
        'key' => $faker->text(),
        'value' => $faker->text(),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Timetable::class, static function (Faker\Generator $faker) {
    return [


    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\SpeakingClub::class, static function (Faker\Generator $faker) {
    return [


    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Timetable::class, static function (Faker\Generator $faker) {
    return [
        'lesson_id' => $faker->sentence,
        'student_id' => $faker->sentence,
        'teacher_id' => $faker->sentence,
        'date' => $faker->dateTime,
        'start_time' => $faker->time(),
        'finish_time' => $faker->time(),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,


    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Mode::class, static function (Faker\Generator $faker) {
    return [
        'user_id' => $faker->sentence,
        'monday' => $faker->sentence,
        'tuesday' => $faker->sentence,
        'wednesday' => $faker->sentence,
        'thursday' => $faker->sentence,
        'friday' => $faker->sentence,
        'saturday' => $faker->sentence,
        'sunday' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,


    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Course::class, static function (Faker\Generator $faker) {
    return [
        'body' => $faker->text(),
        'course_category_id' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'deleted_at' => null,
        'duration' => $faker->sentence,
        'image' => $faker->text(),
        'price' => $faker->randomFloat,
        'slug' => $faker->unique()->slug,
        'title' => $faker->sentence,
        'updated_at' => $faker->dateTime,


    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Course::class, static function (Faker\Generator $faker) {
    return [
        'body' => $faker->text(),
        'course_category_id' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'deleted_at' => null,
        'duration' => $faker->sentence,
        'image' => $faker->text(),
        'price' => $faker->randomFloat,
        'slug' => $faker->unique()->slug,
        'title' => $faker->sentence,
        'updated_at' => $faker->dateTime,


    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\CourseTimeline::class, static function (Faker\Generator $faker) {
    return [
        'course_id' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'model_id' => $faker->sentence,
        'model_type' => $faker->sentence,
        'sequence' => $faker->sentence,
        'updated_at' => $faker->dateTime,


    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\PurchaseCourseClass::class, static function (Faker\Generator $faker) {
    return [
        'user_id' => $faker->sentence,
        'course_class_id' => $faker->sentence,
        'is_approved' => $faker->boolean(),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,


    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Lesson::class, static function (Faker\Generator $faker) {
    return [
        'course_section_id' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'deleted_at' => null,
        'description' => $faker->text(),
        'duration_minute' => $faker->randomNumber(5),
        'level' => $faker->sentence,
        'title' => $faker->sentence,
        'updated_at' => $faker->dateTime,


    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\CourseSection::class, static function (Faker\Generator $faker) {
    return [
        'course_id' => $faker->sentence,
        'title' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,


    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Setting::class, static function (Faker\Generator $faker) {
    return [
        'display_name' => $faker->sentence,
        'key' => $faker->sentence,
        'type' => $faker->text(),
        'value' => $faker->text(),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        'deleted_at' => null,


    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Order::class, static function (Faker\Generator $faker) {
    return [
        'number' => $faker->sentence,
        'user_id' => $faker->sentence,
        'paid' => $faker->boolean(),
        'status' => $faker->sentence,
        'total' => $faker->randomFloat,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,


    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\TabCourse::class, static function (Faker\Generator $faker) {
    return [
        'title' => $faker->sentence,
        'title_image' => $faker->text(),
        'body' => $faker->text(),
        'image' => $faker->text(),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        'deleted_at' => null,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\CourseClass::class, static function (Faker\Generator $faker) {
    return [
        'count' => $faker->randomNumber(5),
        'course_id' => $faker->sentence,
        'price' => $faker->randomFloat,
        'sale' => $faker->randomFloat,
        'class_price' => $faker->randomFloat,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Course::class, static function (Faker\Generator $faker) {
    return [
        'author_id' => $faker->randomNumber(5),
        'title' => $faker->sentence,
        'slug' => $faker->unique()->slug,
        'text' => $faker->text(),
        'image' => $faker->text(),
        'body' => $faker->text(),
        'duration' => $faker->sentence,
        'price' => $faker->randomFloat,
        'is_visible' => $faker->boolean(),
        'course_category_id' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        'deleted_at' => null,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\CourseClass::class, static function (Faker\Generator $faker) {
    return [
        'count' => $faker->randomNumber(5),
        'course_id' => $faker->sentence,
        'price' => $faker->randomFloat,
        'sale' => $faker->randomFloat,
        'class_price' => $faker->randomFloat,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        'title' => $faker->sentence,
        'percent' => $faker->sentence,
        'text' => $faker->text(),
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\CourseCase::class, static function (Faker\Generator $faker) {
    return [
        'title' => $faker->sentence,
        'subtitle' => $faker->sentence,
        'course_id' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        'deleted_at' => null,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\CourseFact::class, static function (Faker\Generator $faker) {
    return [
        'body' => $faker->text(),
        'course_id' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        'deleted_at' => null,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\CourseInfo::class, static function (Faker\Generator $faker) {
    return [
        'title' => $faker->sentence,
        'body' => $faker->text(),
        'image' => $faker->text(),
        'course_id' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        'deleted_at' => null,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Certificate::class, static function (Faker\Generator $faker) {
    return [
        'title' => $faker->sentence,
        'image' => $faker->text(),
        'body' => $faker->text(),
        'course_id' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        'deleted_at' => null,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Feedback::class, static function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName,
        'image' => $faker->text(),
        'rate' => $faker->randomNumber(5),
        'text' => $faker->text(),
        'course_id' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        'deleted_at' => null,
        
        
    ];
});
