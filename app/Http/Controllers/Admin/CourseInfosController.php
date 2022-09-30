<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CourseInfo\BulkDestroyCourseInfo;
use App\Http\Requests\Admin\CourseInfo\DestroyCourseInfo;
use App\Http\Requests\Admin\CourseInfo\IndexCourseInfo;
use App\Http\Requests\Admin\CourseInfo\StoreCourseInfo;
use App\Http\Requests\Admin\CourseInfo\UpdateCourseInfo;
use App\Models\{CourseInfo, Course};
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

class CourseInfosController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexCourseInfo $request
     * @return array|Factory|View
     */
    public function index(IndexCourseInfo $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(CourseInfo::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'title', 'course_id'],

            // set columns to searchIn
            ['id', 'title', 'body', 'image']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.course-info.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.course-info.create');
        $courses = Course::all();
        return view('admin.course-info.create', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreCourseInfo $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreCourseInfo $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the CourseInfo
        $courseInfo = CourseInfo::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/course-infos'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/course-infos');
    }

    /**
     * Display the specified resource.
     *
     * @param CourseInfo $courseInfo
     * @throws AuthorizationException
     * @return void
     */
    public function show(CourseInfo $courseInfo)
    {
        $this->authorize('admin.course-info.show', $courseInfo);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param CourseInfo $courseInfo
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(CourseInfo $courseInfo)
    {
        $this->authorize('admin.course-info.edit', $courseInfo);
        $courses = Course::all();

        return view('admin.course-info.edit', [
            'courseInfo' => $courseInfo,
            'courses' => $courses
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateCourseInfo $request
     * @param CourseInfo $courseInfo
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateCourseInfo $request, CourseInfo $courseInfo)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values CourseInfo
        $courseInfo->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/course-infos'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/course-infos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyCourseInfo $request
     * @param CourseInfo $courseInfo
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyCourseInfo $request, CourseInfo $courseInfo)
    {
        $courseInfo->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyCourseInfo $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyCourseInfo $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    CourseInfo::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
