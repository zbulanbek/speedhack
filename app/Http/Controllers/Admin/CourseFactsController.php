<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CourseFact\BulkDestroyCourseFact;
use App\Http\Requests\Admin\CourseFact\DestroyCourseFact;
use App\Http\Requests\Admin\CourseFact\IndexCourseFact;
use App\Http\Requests\Admin\CourseFact\StoreCourseFact;
use App\Http\Requests\Admin\CourseFact\UpdateCourseFact;
use App\Models\{CourseFact, Course};
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

class CourseFactsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexCourseFact $request
     * @return array|Factory|View
     */
    public function index(IndexCourseFact $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(CourseFact::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'course_id'],

            // set columns to searchIn
            ['id', 'body']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.course-fact.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.course-fact.create');
         $courses = Course::all();
        return view('admin.course-fact.create', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreCourseFact $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreCourseFact $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the CourseFact
        $courseFact = CourseFact::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/course-facts'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/course-facts');
    }

    /**
     * Display the specified resource.
     *
     * @param CourseFact $courseFact
     * @throws AuthorizationException
     * @return void
     */
    public function show(CourseFact $courseFact)
    {
        $this->authorize('admin.course-fact.show', $courseFact);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param CourseFact $courseFact
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(CourseFact $courseFact)
    {
        $this->authorize('admin.course-fact.edit', $courseFact);
        $courses = Course::all();

        return view('admin.course-fact.edit', [
            'courseFact' => $courseFact,
            'courses' => $courses
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateCourseFact $request
     * @param CourseFact $courseFact
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateCourseFact $request, CourseFact $courseFact)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values CourseFact
        $courseFact->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/course-facts'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/course-facts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyCourseFact $request
     * @param CourseFact $courseFact
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyCourseFact $request, CourseFact $courseFact)
    {
        $courseFact->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyCourseFact $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyCourseFact $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    CourseFact::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
