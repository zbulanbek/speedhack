<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TeacherSlider\BulkDestroyTeacherSlider;
use App\Http\Requests\Admin\TeacherSlider\DestroyTeacherSlider;
use App\Http\Requests\Admin\TeacherSlider\IndexTeacherSlider;
use App\Http\Requests\Admin\TeacherSlider\StoreTeacherSlider;
use App\Http\Requests\Admin\TeacherSlider\UpdateTeacherSlider;
use App\Models\TeacherSlider;
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

class TeacherSlidersController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexTeacherSlider $request
     * @return array|Factory|View
     */
    public function index(IndexTeacherSlider $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(TeacherSlider::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'category', 'color', 'course', 'name'],

            // set columns to searchIn
            ['id', 'category', 'color', 'image', 'course', 'name']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.teacher-slider.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.teacher-slider.create');

        return view('admin.teacher-slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreTeacherSlider $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreTeacherSlider $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the TeacherSlider
        $teacherSlider = TeacherSlider::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/teacher-sliders'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/teacher-sliders');
    }

    /**
     * Display the specified resource.
     *
     * @param TeacherSlider $teacherSlider
     * @throws AuthorizationException
     * @return void
     */
    public function show(TeacherSlider $teacherSlider)
    {
        $this->authorize('admin.teacher-slider.show', $teacherSlider);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param TeacherSlider $teacherSlider
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(TeacherSlider $teacherSlider)
    {
        $this->authorize('admin.teacher-slider.edit', $teacherSlider);


        return view('admin.teacher-slider.edit', [
            'teacherSlider' => $teacherSlider,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateTeacherSlider $request
     * @param TeacherSlider $teacherSlider
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateTeacherSlider $request, TeacherSlider $teacherSlider)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values TeacherSlider
        $teacherSlider->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/teacher-sliders'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/teacher-sliders');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyTeacherSlider $request
     * @param TeacherSlider $teacherSlider
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyTeacherSlider $request, TeacherSlider $teacherSlider)
    {
        $teacherSlider->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyTeacherSlider $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyTeacherSlider $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    TeacherSlider::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
