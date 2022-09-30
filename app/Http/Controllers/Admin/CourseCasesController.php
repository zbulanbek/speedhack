<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CourseCase\BulkDestroyCourseCase;
use App\Http\Requests\Admin\CourseCase\DestroyCourseCase;
use App\Http\Requests\Admin\CourseCase\IndexCourseCase;
use App\Http\Requests\Admin\CourseCase\StoreCourseCase;
use App\Http\Requests\Admin\CourseCase\UpdateCourseCase;
use App\Models\{CourseCase, Course};
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

class CourseCasesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexCourseCase $request
     * @return array|Factory|View
     */
    public function index(IndexCourseCase $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(CourseCase::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'title', 'subtitle', 'course_id'],

            // set columns to searchIn
            ['id', 'title', 'subtitle']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.course-case.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.course-case.create');
        $courses = Course::all();
        return view('admin.course-case.create', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreCourseCase $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreCourseCase $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the CourseCase
        $courseCase = CourseCase::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/course-cases'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/course-cases');
    }

    /**
     * Display the specified resource.
     *
     * @param CourseCase $courseCase
     * @throws AuthorizationException
     * @return void
     */
    public function show(CourseCase $courseCase)
    {
        $this->authorize('admin.course-case.show', $courseCase);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param CourseCase $courseCase
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(CourseCase $courseCase)
    {
        $this->authorize('admin.course-case.edit', $courseCase);
        $courses = Course::all();

        return view('admin.course-case.edit', [
            'courseCase' => $courseCase,
            'courses' => $courses
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateCourseCase $request
     * @param CourseCase $courseCase
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateCourseCase $request, CourseCase $courseCase)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values CourseCase
        $courseCase->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/course-cases'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/course-cases');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyCourseCase $request
     * @param CourseCase $courseCase
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyCourseCase $request, CourseCase $courseCase)
    {
        $courseCase->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyCourseCase $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyCourseCase $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    CourseCase::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
