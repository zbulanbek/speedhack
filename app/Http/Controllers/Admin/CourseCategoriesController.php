<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CourseCategory\BulkDestroyCourseCategory;
use App\Http\Requests\Admin\CourseCategory\DestroyCourseCategory;
use App\Http\Requests\Admin\CourseCategory\IndexCourseCategory;
use App\Http\Requests\Admin\CourseCategory\StoreCourseCategory;
use App\Http\Requests\Admin\CourseCategory\UpdateCourseCategory;
use App\Models\CourseCategory;
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

class CourseCategoriesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexCourseCategory $request
     * @return array|Factory|View
     */
    public function index(IndexCourseCategory $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(CourseCategory::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'title'],

            // set columns to searchIn
            ['id', 'title']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.course-category.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.course-category.create');

        return view('admin.course-category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreCourseCategory $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreCourseCategory $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the CourseCategory
        $courseCategory = CourseCategory::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/course-categories'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/course-categories');
    }

    /**
     * Display the specified resource.
     *
     * @param CourseCategory $courseCategory
     * @throws AuthorizationException
     * @return void
     */
    public function show(CourseCategory $courseCategory)
    {
        $this->authorize('admin.course-category.show', $courseCategory);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param CourseCategory $courseCategory
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(CourseCategory $courseCategory)
    {
        $this->authorize('admin.course-category.edit', $courseCategory);


        return view('admin.course-category.edit', [
            'courseCategory' => $courseCategory,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateCourseCategory $request
     * @param CourseCategory $courseCategory
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateCourseCategory $request, CourseCategory $courseCategory)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values CourseCategory
        $courseCategory->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/course-categories'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/course-categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyCourseCategory $request
     * @param CourseCategory $courseCategory
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyCourseCategory $request, CourseCategory $courseCategory)
    {
        $courseCategory->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyCourseCategory $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyCourseCategory $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    CourseCategory::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
