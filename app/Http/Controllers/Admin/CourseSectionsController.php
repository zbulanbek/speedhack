<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CourseSection\BulkDestroyCourseSection;
use App\Http\Requests\Admin\CourseSection\DestroyCourseSection;
use App\Http\Requests\Admin\CourseSection\IndexCourseSection;
use App\Http\Requests\Admin\CourseSection\StoreCourseSection;
use App\Http\Requests\Admin\CourseSection\UpdateCourseSection;
use App\Models\Course;
use App\Models\CourseSection;
use Brackets\AdminListing\Facades\AdminListing;
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

class CourseSectionsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexCourseSection $request
     * @return array|Factory|View
     */
    public function index(IndexCourseSection $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(CourseSection::class)->modifyQuery(function ($query) {
            $user = Auth::user();
            if (!$user->hasRole('Administrator')) {
                $query->whereHas('course', function ($query) use ($user) {
                    $query->where('author_id', $user->id);
                });
            }
        })->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'course_id', 'title'],

            // set columns to searchIn
            ['id', 'title'],

            function ($query) use ($request) {
                $query->with(['course']);
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

        return view('admin.course-section.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $courses = Course::get(['id', 'title']);
        $this->authorize('admin.course-section.create');

        return view('admin.course-section.create', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreCourseSection $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreCourseSection $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the CourseSection
        $courseSection = CourseSection::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/course-sections'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/course-sections');
    }

    /**
     * Display the specified resource.
     *
     * @param CourseSection $courseSection
     * @throws AuthorizationException
     * @return void
     */
    public function show(CourseSection $courseSection)
    {
        $this->authorize('admin.course-section.show', $courseSection);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param CourseSection $courseSection
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(CourseSection $courseSection)
    {
        $courses = Course::get(['id', 'title']);
        $this->authorize('admin.course-section.edit', $courseSection);


        return view('admin.course-section.edit', [
            'courseSection' => $courseSection,
            'courses' => $courses,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateCourseSection $request
     * @param CourseSection $courseSection
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateCourseSection $request, CourseSection $courseSection)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values CourseSection
        $courseSection->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/course-sections'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/course-sections');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyCourseSection $request
     * @param CourseSection $courseSection
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyCourseSection $request, CourseSection $courseSection)
    {
        $courseSection->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyCourseSection $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyCourseSection $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    CourseSection::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
