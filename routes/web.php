<?php

use App\Http\Controllers\Account\CourseClassController;
use App\Http\Controllers\Account\HomeWorkController;
use App\Http\Controllers\API\PayboxController;
use App\Http\Controllers\API\TwilioAccessTokenController;
use App\Http\Controllers\PusherController;
use App\Http\Controllers\Account\CourseController;
use App\Http\Controllers\TrialLessonController;
use App\Http\Controllers\WebinarController;
use App\Models\Role;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\TimetablesController;
use App\Http\Controllers\SpeakingClubController;
use App\Http\Controllers\MetodistController;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::post('/pusher/auth', [PusherController::class, 'auth'])->name('pusher.auth');
Route::get('/', [HomeController::class, 'welcome'])->name('welcome');
Route::get('/all/courses', [HomeController::class, 'all_courses'])->name('all_courses');
Route::get('/course/{id}', [HomeController::class, 'course'])->name('course');
Route::get('/teacher', [HomeController::class, 'teacher'])->name('teacher');
Route::get('/news', [HomeController::class, 'news'])->name('news');
Route::get('/news/item/{news}', [HomeController::class, 'news_item'])->name('news_item');
Route::get('/comments', [HomeController::class, 'comments'])->name('comments');
Route::get('/error', [HomeController::class, 'error'])->name('error');
Route::get('/offer', [HomeController::class, 'offer'])->name('offer');
Route::get('/reset-password/{token}', [LoginController::class, 'resetPassword'])->name('password.reset');


Route::prefix('paybox')->name('paybox.')->group(function() {
    Route::get('/success', [PayboxController::class, 'success'])->name('success');
    Route::get('/result', [PayboxController::class, 'result'])->name('result');
    Route::get('/check', [PayboxController::class, 'check'])->name('check');
    Route::get('/cancel', [PayboxController::class, 'cancel'])->name('cancel');
    Route::get('/failure', [PayboxController::class, 'failure'])->name('failure');
    Route::get('/back', [PayboxController::class, 'back'])->name('back');
    Route::get('/capture', [PayboxController::class, 'capture'])->name('capture');

});


Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('/home', [HomeController::class, 'home'])->name('home');
    Route::prefix('account')->group(function () {
        Route::get('/course/active', [StudentController::class, 'course_active'])->name('course.active');
        Route::get('/profile/edit', [StudentController::class, 'edit'])->name('account.profile.edit');
        Route::get('/profile', [StudentController::class, 'profile'])->name('account.profile');
        Route::prefix('/webinars')->name('webinars.')->group(function () {
            Route::get('/', [WebinarController::class, 'index'])->name('index');
            Route::post('/store', [WebinarController::class, 'store'])->name('webinar.store');
            Route::get('/{webinar}', [WebinarController::class, 'show'])->name('show');
        });
    });
    Route::prefix('account')->name('account.')->group(function () {
        Route::post('/calendar/create', [TimetablesController::class, 'create'])->name('calendar.create');
        Route::get('/', [StudentController::class, 'profile'])->name('index');
        Route::get('/test/{lesson}', [TestController::class, 'show'])->name('test');
        Route::post('/student/update/password', [StudentController::class, 'update_password'])->name('student.update.password');

        Route::get('/news', [NewsController::class, 'show'])->name('news');
        Route::get('/news/get', [NewsController::class, 'get_news'])->name('get.news');
        Route::get('/news/item/{news}', [NewsController::class, 'news_item'])->name('news.item');
        Route::get('/materials', [MaterialController::class, 'show'])->name('materials');
        Route::post('/materials', [MaterialController::class, 'delete'])->name('materials.delete');
        Route::get('/calendar', [TimetablesController::class, 'show'])->name('calendar');
        Route::get('/events', [SpeakingClubController::class, 'show'])->name('events');
        Route::post('/get/events', [SpeakingClubController::class, 'get'])->name('get.events');
        Route::get('/news', [NewsController::class, 'show'])->name('account.news');
        Route::get('/news/get', [NewsController::class, 'get_news'])->name('account.get.news');
        Route::get('/news/item/{news}', [NewsController::class, 'news_item'])->name('account.news.item');
        Route::get('/materials', [MaterialController::class, 'show'])->name('account.materials');
        Route::post('/materials', [MaterialController::class, 'delete'])->name('account.materials.delete');
        Route::get('/calendar', [TimetablesController::class, 'show'])->name('account.calendar');
        Route::get('/events', [SpeakingClubController::class, 'show'])->name('account.events');
        Route::post('/get/events', [SpeakingClubController::class, 'get'])->name('account.get.events');

        Route::prefix('courses')->name('courses.')->group(function () {
            Route::get('/', [CourseController::class, 'index'])->name('index');
            Route::get('/{course}', [CourseController::class, 'show'])->name('show');
        });

        Route::prefix('catalog')->name('catalog.')->group(function () {
            Route::prefix('courses')->name('courses.')->group(function () {
                Route::get('/', [CourseClassController::class, 'index'])->name('index');
                Route::get('/{course}/classes', [CourseClassController::class, 'classes'])->name('classes');
                Route::post('/classes/{courseClass}/buy', [CourseClassController::class, 'buyCourseClass'])->name('classes.buy');
            });
        });

        Route::prefix('/lessons')->name('lessons.')->group(function () {
            Route::get('/{lesson}', [CourseController::class, 'lesson'])->name('show');
        });

        Route::prefix('/home-works')->name('home-works.')->group(function () {
            Route::get('/', [HomeWorkController::class, 'index'])->name('index');
            Route::get('/{homeWork}', [HomeWorkController::class, 'show'])->name('show');
            Route::get('/{homeWork}/tasks', [HomeWorkController::class, 'tasks'])->name('tasks');
            Route::get('/group-by/{course}', [HomeWorkController::class, 'groupByCourse'])->name('groupBy.course');
        });

        Route::get('/homework', [StudentController::class, 'homework'])->name('homework');


        Route::get('/grammar', [StudentController::class, 'grammar'])->name('grammar');
        Route::get('/vocabulary', [StudentController::class, 'vocabulary'])->name('vocabulary');
        Route::get('/event/item', [StudentController::class, 'eventItems'])->name('eventItems');
        Route::get('/event/lesson', [StudentController::class, 'eventLesson'])->name('eventLesson');


    });
    Route::group(['middleware' => ['role_or:' . Role::METODIST_ROLE_ID]], function () {
        Route::prefix('metodist')->group(function () {
            Route::get('/', [MetodistController::class, 'applications'])->name('metodist');
            Route::get('/applications', [MetodistController::class, 'applications'])->name('metodist.applications');
            Route::get('/apies', [MetodistController::class, 'apies'])->name('metodist.apies');
            Route::get('/profile', [MetodistController::class, 'profile'])->name('metodist.profile');
            Route::get('/results', [MetodistController::class, 'results'])->name('metodist.results');
            Route::post('/topic/key', [MetodistController::class, 'topic_key'])->name('topic.key');
            Route::post('/show/topic/block', [MetodistController::class, 'topic_block'])->name('topic.block');
            Route::post('/comment', [MetodistController::class, 'comment'])->name('metodist.comment');
            Route::get('/timetables', [MetodistController::class, 'timetables'])->name('metodist.timetables');
            Route::post('/change/mode', [MetodistController::class, 'changeMode'])->name('metodist.changeMode');
            Route::post('/update/mode', [MetodistController::class, 'updateMode'])->name('metodist.updateMode');
            Route::post('/get/notice', [MetodistController::class, 'getNotice'])->name('metodist.getNotice');
            Route::get('/calendar', [TimetablesController::class, 'show'])->name('metodist.calendar');
        });
    });
    Route::group(['middleware' => ['role_or:' . Role::TEACHER_ROLE_ID]], function () {
        Route::prefix('teacher')->group(function () {
            Route::get('/', [TeacherController::class, 'profile'])->name('teacher');
            Route::get('/profile', [TeacherController::class, 'profile'])->name('teacher.profile');
            Route::get('/calendar', [TimetablesController::class, 'show'])->name('teacher.calendar');
            Route::get('/homework', [TeacherController::class, 'homework'])->name('teacher.homework');
            Route::get('/calendar', [TimetablesController::class, 'show'])->name('teacher.calendar');

            Route::get('/courses', [TeacherController::class, 'courses'])->name('teacher.courses');
            Route::get('/course/{course}', [TeacherController::class, 'course_show'])->name('teacher.courses.show');
            
        });
    });

    Route::prefix('timetable')->name('timetable.')->group(function () {
        Route::get('/{timetable}', [TimetablesController::class, 'show_lesson'])->name('show_lesson');
    });

    Route::prefix('trial-lessons')->name('trial-lessons.')->group(function () {
        Route::get('/{trial_lesson:room_name}', [TrialLessonController::class, 'show'])->name('show');
        Route::get('/{trial_lesson:room_name}/{lesson}', [TrialLessonController::class, 'show_lesson'])->name('show_lesson');
        Route::post('/{trial_lesson:room_name}/handle/interactive', [TrialLessonController::class, 'handleInteractive'])->name('handle.interactive');
        Route::post('/{trial_lesson:room_name}/task/correct-options/handle/change', [TrialLessonController::class, 'taskCorrectOptionsHandleChange'])->name('task.correct-options.handle.change');
        Route::post('/{trial_lesson:room_name}/tabs/change', [TrialLessonController::class, 'handleChangeTabs'])->name('tabs.change');
    });

    Route::post('/trial/get/tests', [StudentController::class, 'test_trial'])->name('test.trial');
    Route::get('/trial/calendar/lesson', [StudentController::class, 'trial_2'])->name('trial2');
});

Route::prefix('test')->middleware('auth')->group(function () {
    Route::post('/questions', [TestController::class, 'question']);
    Route::prefix('question/')->name('test.')->group(function () {
        Route::post('/answers', [TestController::class, 'answers'])->name('answers');
        Route::post('/metodist/answers', [TestController::class, 'answers_metodist'])->name('answers.metodist');

        Route::post('/one/check', [TestController::class, 'one_check'])->name('one.check');
        Route::post('/one/drag', [TestController::class, 'one_drag'])->name('one.drag');

        Route::post('/two/check', [TestController::class, 'two_check'])->name('two.check');
        Route::post('/two/check/metodist', [TestController::class, 'two_check_metodist'])->name('two.check.metodist');
        Route::post('/two/drag', [TestController::class, 'two_drag'])->name('two.drag');

        Route::post('/three/check', [TestController::class, 'three_check'])->name('three.check');
        Route::post('/three/drag', [TestController::class, 'three_drag'])->name('three.drag');

        Route::post('/four/check', [TestController::class, 'four_check'])->name('four.check');
        Route::post('/four/drag', [TestController::class, 'four_drag'])->name('four.drag');
        Route::post('/four/answers/drag', [TestController::class, 'four_answers_drag'])->name('four.answers.drag');

        Route::post('/five/check', [TestController::class, 'five_check'])->name('five.check');
        Route::post('/five/check/metodist', [TestController::class, 'five_check_metodist'])->name('five.check.metodist');
        Route::post('/five/drag', [TestController::class, 'five_drag'])->name('five.drag');

        Route::post('/save/ball', [TestController::class, 'save_lesson_ball'])->name('save.ball');
    });
});


Route::prefix('twilio-video')->name('twilio-video.')->middleware('auth:sanctum')->group(function () {
    Route::get('access_token', [TwilioAccessTokenController::class, 'generate_token'])->name('generate-token');
    Route::get('create-room', [TwilioAccessTokenController::class, 'createRoom'])->name('create-room');
});


Route::namespace('App\Http\Controllers\API')->prefix('api')->name('api.')->group(function () {
    Route::prefix('list')->name('list.')->group(function () {
        Route::get('/methodist-statuses', 'ListController@methodistStatuses')->name('methodist-statuses');
    });

    Route::prefix('lessons')->name('lessons.')->group(function () {
        Route::get('/{lesson}', 'LessonController@show')->name('show');
    });

    Route::prefix('methodist')->name('methodist.')->middleware('auth:sanctum')->group(function () {
        Route::prefix('applications')->name('applications.')->group(function () {
            Route::get('/', 'Methodist\ApplicationController@index')
                ->name('index');

            Route::post('/{application}/update/date', 'Methodist\ApplicationController@updateDate')
                ->name('update_date');

            Route::patch('/{application}/accept', 'Methodist\ApplicationController@accept')
                ->name('accept');

            Route::patch('/{application}/update-status', 'Methodist\ApplicationController@updateStatus')
                ->name('update_status');

        });
    });

    Route::prefix('tasks')->name('tasks.')->group(function () {
        Route::prefix('questions')->name('questions.')->group(function () {
            Route::get('/correct-options', 'TaskController@questionCorrectOptions')->name('correct-options');
            Route::post('/{question}/user-answer', 'TaskController@questionUserAnswers')->name('user-answer');
        });
    });
});

//Admin

Route::prefix('application')->name('application.')->group(function () {
    Route::post('/create', [ApplicationController::class, 'create'])->name('create');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return \Inertia\Inertia::render('Dashboard');
})->name('dashboard');


/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function () {
        Route::prefix('admin-users')->name('admin-users/')->group(static function () {
            Route::get('/', 'AdminUsersController@index')->name('index');
            Route::get('/create', 'AdminUsersController@create')->name('create');
            Route::post('/', 'AdminUsersController@store')->name('store');
            Route::get('/{adminUser}/impersonal-login', 'AdminUsersController@impersonalLogin')->name('impersonal-login');
            Route::get('/{adminUser}/edit', 'AdminUsersController@edit')->name('edit');
            Route::post('/{adminUser}', 'AdminUsersController@update')->name('update');
            Route::delete('/{adminUser}', 'AdminUsersController@destroy')->name('destroy');
            Route::get('/{adminUser}/resend-activation', 'AdminUsersController@resendActivationEmail')->name('resendActivationEmail');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function () {
        Route::get('/profile', 'ProfileController@editProfile')->name('edit-profile');
        Route::post('/profile', 'ProfileController@updateProfile')->name('update-profile');
        Route::get('/password', 'ProfileController@editPassword')->name('edit-password');
        Route::post('/password', 'ProfileController@updatePassword')->name('update-password');
    });
});


/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function () {
        Route::prefix('applications')->name('applications/')->group(static function () {
            Route::get('/', 'ApplicationsController@index')->name('index');
            Route::get('/create', 'ApplicationsController@create')->name('create');
            Route::post('/', 'ApplicationsController@store')->name('store');
            Route::get('/{application}/edit', 'ApplicationsController@edit')->name('edit');
            Route::post('/bulk-destroy', 'ApplicationsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{application}', 'ApplicationsController@update')->name('update');
            Route::delete('/{application}', 'ApplicationsController@destroy')->name('destroy');
        });
    });
});

Route::get('{any}', function () {
    return Inertia::render('Speedhack/Static/Error');
});


/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function () {

        Route::prefix('materials')->name('materials/')->group(static function () {
            Route::get('/', 'MaterialsController@index')->name('index');
            Route::get('/create', 'MaterialsController@create')->name('create');
            Route::post('/', 'MaterialsController@store')->name('store');
            Route::get('/{material}/edit', 'MaterialsController@edit')->name('edit');
            Route::post('/bulk-destroy', 'MaterialsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{material}', 'MaterialsController@update')->name('update');
            Route::delete('/{material}', 'MaterialsController@destroy')->name('destroy');
        });

        Route::prefix('teacher-sliders')->name('teacher-sliders/')->group(static function () {
            Route::get('/', 'TeacherSlidersController@index')->name('index');
            Route::get('/create', 'TeacherSlidersController@create')->name('create');
            Route::post('/', 'TeacherSlidersController@store')->name('store');
            Route::get('/{teacherSlider}/edit', 'TeacherSlidersController@edit')->name('edit');
            Route::post('/bulk-destroy', 'TeacherSlidersController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{teacherSlider}', 'TeacherSlidersController@update')->name('update');
            Route::delete('/{teacherSlider}', 'TeacherSlidersController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function () {
        Route::prefix('tab-courses')->name('tab-courses/')->group(static function () {
            Route::get('/', 'TabCourseController@index')->name('index');
            Route::get('/create', 'TabCourseController@create')->name('create');
            Route::post('/', 'TabCourseController@store')->name('store');
            Route::get('/{tabCourse}/edit', 'TabCourseController@edit')->name('edit');
            Route::post('/bulk-destroy', 'TabCourseController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{tabCourse}', 'TabCourseController@update')->name('update');
            Route::delete('/{tabCourse}', 'TabCourseController@destroy')->name('destroy');
        });
    });
});






/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function () {
        Route::prefix('speaking-clubs')->name('speaking-clubs/')->group(static function () {
            Route::get('/', 'SpeakingClubsController@index')->name('index');
            Route::get('/create', 'SpeakingClubsController@create')->name('create');
            Route::post('/', 'SpeakingClubsController@store')->name('store');
            Route::get('/{speakingClub}/edit', 'SpeakingClubsController@edit')->name('edit');
            Route::post('/bulk-destroy', 'SpeakingClubsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{speakingClub}', 'SpeakingClubsController@update')->name('update');
            Route::delete('/{speakingClub}', 'SpeakingClubsController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function () {
        Route::prefix('timetables')->name('timetables/')->group(static function () {
            Route::get('/', 'TimetablesController@index')->name('index');
            Route::get('/create', 'TimetablesController@create')->name('create');
            Route::post('/', 'TimetablesController@store')->name('store');
            Route::get('/{timetable}/edit', 'TimetablesController@edit')->name('edit');
            Route::post('/bulk-destroy', 'TimetablesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{timetable}', 'TimetablesController@update')->name('update');
            Route::delete('/{timetable}', 'TimetablesController@destroy')->name('destroy');
        });
    });
});


/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function () {
        Route::prefix('modes')->name('modes/')->group(static function () {
            Route::get('/', 'ModesController@index')->name('index');
            Route::get('/create', 'ModesController@create')->name('create');
            Route::post('/', 'ModesController@store')->name('store');
            Route::get('/{mode}/edit', 'ModesController@edit')->name('edit');
            Route::post('/bulk-destroy', 'ModesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{mode}', 'ModesController@update')->name('update');
            Route::delete('/{mode}', 'ModesController@destroy')->name('destroy');
        });
    });
});




/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function () {
        Route::prefix('purchase-course-classes')->name('purchase-course-classes/')->group(static function () {
            Route::get('/', 'PurchaseCourseClassesController@index')->name('index');
            Route::get('/create', 'PurchaseCourseClassesController@create')->name('create');
            Route::post('/', 'PurchaseCourseClassesController@store')->name('store');
            Route::get('/{purchaseCourseClass}/edit', 'PurchaseCourseClassesController@edit')->name('edit');
            Route::post('/bulk-destroy', 'PurchaseCourseClassesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{purchaseCourseClass}', 'PurchaseCourseClassesController@update')->name('update');
            Route::delete('/{purchaseCourseClass}', 'PurchaseCourseClassesController@destroy')->name('destroy');
        });
    });
});


/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('lessons')->name('lessons/')->group(static function() {
            Route::get('/',                                             'LessonsController@index')->name('index');
            Route::get('/create',                                       'LessonsController@create')->name('create');
            Route::post('/',                                            'LessonsController@store')->name('store');
            Route::get('/{lesson}/edit',                                'LessonsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'LessonsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{lesson}',                                    'LessonsController@update')->name('update');
            Route::delete('/{lesson}',                                  'LessonsController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('course-sections')->name('course-sections/')->group(static function() {
            Route::get('/',                                             'CourseSectionsController@index')->name('index');
            Route::get('/create',                                       'CourseSectionsController@create')->name('create');
            Route::post('/',                                            'CourseSectionsController@store')->name('store');
            Route::get('/{courseSection}/edit',                         'CourseSectionsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'CourseSectionsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{courseSection}',                             'CourseSectionsController@update')->name('update');
            Route::delete('/{courseSection}',                           'CourseSectionsController@destroy')->name('destroy');
        });
    });
});




/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('settings')->name('settings/')->group(static function() {
            Route::get('/',                                             'SettingsController@index')->name('index');
            Route::get('/create',                                       'SettingsController@create')->name('create');
            Route::post('/',                                            'SettingsController@store')->name('store');
            Route::get('/{setting}/edit',                               'SettingsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'SettingsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{setting}',                                   'SettingsController@update')->name('update');
            Route::delete('/{setting}',                                 'SettingsController@destroy')->name('destroy');
        });
    });
});


/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('orders')->name('orders/')->group(static function() {
            Route::get('/',                                             'OrdersController@index')->name('index');
            Route::get('/create',                                       'OrdersController@create')->name('create');
            Route::post('/',                                            'OrdersController@store')->name('store');
            Route::get('/{order}/edit',                                 'OrdersController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'OrdersController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{order}',                                     'OrdersController@update')->name('update');
            Route::delete('/{order}',                                   'OrdersController@destroy')->name('destroy');
        });
    });
});


/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('tab-courses')->name('tab-courses/')->group(static function() {
            Route::get('/',                                             'TabCoursesController@index')->name('index');
            Route::get('/create',                                       'TabCoursesController@create')->name('create');
            Route::post('/',                                            'TabCoursesController@store')->name('store');
            Route::get('/{tabCourse}/edit',                             'TabCoursesController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'TabCoursesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{tabCourse}',                                 'TabCoursesController@update')->name('update');
            Route::delete('/{tabCourse}',                               'TabCoursesController@destroy')->name('destroy');
        });
    });
});



/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('courses')->name('courses/')->group(static function() {
            Route::get('/',                                             'CoursesController@index')->name('index');
            Route::get('/create',                                       'CoursesController@create')->name('create');
            Route::post('/',                                            'CoursesController@store')->name('store');
            Route::get('/{course}/edit',                                'CoursesController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'CoursesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{course}',                                    'CoursesController@update')->name('update');
            Route::delete('/{course}',                                  'CoursesController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('course-classes')->name('course-classes/')->group(static function() {
            Route::get('/',                                             'CourseClassesController@index')->name('index');
            Route::get('/create',                                       'CourseClassesController@create')->name('create');
            Route::post('/',                                            'CourseClassesController@store')->name('store');
            Route::get('/{courseClass}/edit',                           'CourseClassesController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'CourseClassesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{courseClass}',                               'CourseClassesController@update')->name('update');
            Route::delete('/{courseClass}',                             'CourseClassesController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('course-cases')->name('course-cases/')->group(static function() {
            Route::get('/',                                             'CourseCasesController@index')->name('index');
            Route::get('/create',                                       'CourseCasesController@create')->name('create');
            Route::post('/',                                            'CourseCasesController@store')->name('store');
            Route::get('/{courseCase}/edit',                            'CourseCasesController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'CourseCasesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{courseCase}',                                'CourseCasesController@update')->name('update');
            Route::delete('/{courseCase}',                              'CourseCasesController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('course-facts')->name('course-facts/')->group(static function() {
            Route::get('/',                                             'CourseFactsController@index')->name('index');
            Route::get('/create',                                       'CourseFactsController@create')->name('create');
            Route::post('/',                                            'CourseFactsController@store')->name('store');
            Route::get('/{courseFact}/edit',                            'CourseFactsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'CourseFactsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{courseFact}',                                'CourseFactsController@update')->name('update');
            Route::delete('/{courseFact}',                              'CourseFactsController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('course-infos')->name('course-infos/')->group(static function() {
            Route::get('/',                                             'CourseInfosController@index')->name('index');
            Route::get('/create',                                       'CourseInfosController@create')->name('create');
            Route::post('/',                                            'CourseInfosController@store')->name('store');
            Route::get('/{courseInfo}/edit',                            'CourseInfosController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'CourseInfosController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{courseInfo}',                                'CourseInfosController@update')->name('update');
            Route::delete('/{courseInfo}',                              'CourseInfosController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('certificates')->name('certificates/')->group(static function() {
            Route::get('/',                                             'CertificatesController@index')->name('index');
            Route::get('/create',                                       'CertificatesController@create')->name('create');
            Route::post('/',                                            'CertificatesController@store')->name('store');
            Route::get('/{certificate}/edit',                           'CertificatesController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'CertificatesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{certificate}',                               'CertificatesController@update')->name('update');
            Route::delete('/{certificate}',                             'CertificatesController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('feedback')->name('feedback/')->group(static function() {
            Route::get('/',                                             'FeedbackController@index')->name('index');
            Route::get('/create',                                       'FeedbackController@create')->name('create');
            Route::post('/',                                            'FeedbackController@store')->name('store');
            Route::get('/{feedback}/edit',                              'FeedbackController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'FeedbackController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{feedback}',                                  'FeedbackController@update')->name('update');
            Route::delete('/{feedback}',                                'FeedbackController@destroy')->name('destroy');
        });
    });
});