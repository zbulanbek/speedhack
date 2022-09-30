<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Lesson\BulkDestroyLesson;
use App\Http\Requests\Admin\Lesson\DestroyLesson;
use App\Http\Requests\Admin\Lesson\IndexLesson;
use App\Http\Requests\Admin\Lesson\StoreLesson;
use App\Http\Requests\Admin\Lesson\UpdateLesson;
use App\Models\CourseSection;
use App\Models\Lesson;
use Brackets\AdminListing\Facades\AdminListing;
use Carbon\Carbon;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class LessonsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexLesson $request
     * @return array|Factory|View
     */
    public function index(IndexLesson $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Lesson::class)->modifyQuery(function ($query) {
            $user = Auth::user();
            if (!$user->hasRole('Administrator')) {
                $query->whereHas('courseSection', function ($query) use ($user) {
                    $query->whereHas('course', function ($query) use ($user) {
                        $query->where('author_id', $user->id);
                    });
                });
            }
        })->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['course_section_id', 'duration_minute', 'id', 'level', 'title'],

            // set columns to searchIn
            ['description', 'id', 'level', 'title'],
            function ($query) use ($request) {
                $query->with(['courseSection']);
            }
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.lesson.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $courseSections = CourseSection::get(['id', 'title']);
        $this->authorize('admin.lesson.create');

        return view('admin.lesson.create', compact('courseSections'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreLesson $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreLesson $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Lesson
        $lesson = Lesson::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/lessons'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/lessons');
    }

    /**
     * Display the specified resource.
     *
     * @param Lesson $lesson
     * @throws AuthorizationException
     * @return void
     */
    public function show(Lesson $lesson)
    {
        $this->authorize('admin.lesson.show', $lesson);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Lesson $lesson
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Lesson $lesson)
    {
        $courseSections = CourseSection::get(['id', 'title']);
        $this->authorize('admin.lesson.edit', $lesson);


        return view('admin.lesson.edit', [
            'lesson' => $lesson,
            'courseSections' => $courseSections,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateLesson $request
     * @param Lesson $lesson
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateLesson $request, Lesson $lesson)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Lesson
        $lesson->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/lessons'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/lessons');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyLesson $request
     * @param Lesson $lesson
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyLesson $request, Lesson $lesson)
    {
        $lesson->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyLesson $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyLesson $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    DB::table('lessons')->whereIn('id', $bulkChunk)
                        ->update([
                            'deleted_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ]);

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
