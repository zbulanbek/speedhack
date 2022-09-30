<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CourseClass\BulkDestroyCourseClass;
use App\Http\Requests\Admin\CourseClass\DestroyCourseClass;
use App\Http\Requests\Admin\CourseClass\IndexCourseClass;
use App\Http\Requests\Admin\CourseClass\StoreCourseClass;
use App\Http\Requests\Admin\CourseClass\UpdateCourseClass;
use App\Models\{CourseClass, Course};
use Brackets\AdminListing\Facades\AdminListing;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class CourseClassesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexCourseClass $request
     * @return array|Factory|View
     */
    public function index(IndexCourseClass $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(CourseClass::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'count', 'course_id', 'price', 'sale', 'class_price', 'title', 'percent'],

            // set columns to searchIn
            ['id', 'title', 'percent', 'text']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.course-class.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.course-class.create');

        $courses = Course::all();

        return view('admin.course-class.create', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreCourseClass $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreCourseClass $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the CourseClass
        $courseClass = CourseClass::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/course-classes'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/course-classes');
    }

    /**
     * Display the specified resource.
     *
     * @param CourseClass $courseClass
     * @throws AuthorizationException
     * @return void
     */
    public function show(CourseClass $courseClass)
    {
        $this->authorize('admin.course-class.show', $courseClass);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param CourseClass $courseClass
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(CourseClass $courseClass)
    {
        $this->authorize('admin.course-class.edit', $courseClass);
        $courses = Course::all();

        return view('admin.course-class.edit', [
            'courseClass' => $courseClass,
            'courses' => $courses
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateCourseClass $request
     * @param CourseClass $courseClass
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateCourseClass $request, CourseClass $courseClass)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values CourseClass
        $courseClass->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/course-classes'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/course-classes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyCourseClass $request
     * @param CourseClass $courseClass
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyCourseClass $request, CourseClass $courseClass)
    {
        $courseClass->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyCourseClass $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyCourseClass $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    CourseClass::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
