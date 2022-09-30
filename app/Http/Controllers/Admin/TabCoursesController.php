<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TabCourse\BulkDestroyTabCourse;
use App\Http\Requests\Admin\TabCourse\DestroyTabCourse;
use App\Http\Requests\Admin\TabCourse\IndexTabCourse;
use App\Http\Requests\Admin\TabCourse\StoreTabCourse;
use App\Http\Requests\Admin\TabCourse\UpdateTabCourse;
use App\Models\TabCourse;
use Brackets\AdminListing\Facades\AdminListing;
use Carbon\Carbon;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class TabCoursesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexTabCourse $request
     * @return array|Factory|View
     */
    public function index(IndexTabCourse $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(TabCourse::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'title'],

            // set columns to searchIn
            ['id', 'title', 'title_image', 'body', 'image']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.tab-course.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.tab-course.create');

        return view('admin.tab-course.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreTabCourse $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreTabCourse $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the TabCourse
        $tabCourse = TabCourse::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/tab-courses'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/tab-courses');
    }

    /**
     * Display the specified resource.
     *
     * @param TabCourse $tabCourse
     * @throws AuthorizationException
     * @return void
     */
    public function show(TabCourse $tabCourse)
    {
        $this->authorize('admin.tab-course.show', $tabCourse);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param TabCourse $tabCourse
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(TabCourse $tabCourse)
    {
        $this->authorize('admin.tab-course.edit', $tabCourse);


        return view('admin.tab-course.edit', [
            'tabCourse' => $tabCourse,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateTabCourse $request
     * @param TabCourse $tabCourse
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateTabCourse $request, TabCourse $tabCourse)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values TabCourse
        $tabCourse->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/tab-courses'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/tab-courses');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyTabCourse $request
     * @param TabCourse $tabCourse
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyTabCourse $request, TabCourse $tabCourse)
    {
        $tabCourse->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyTabCourse $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyTabCourse $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    DB::table('tabCourses')->whereIn('id', $bulkChunk)
                        ->update([
                            'deleted_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ]);

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
