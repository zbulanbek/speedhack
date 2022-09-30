<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Timetable\BulkDestroyTimetable;
use App\Http\Requests\Admin\Timetable\DestroyTimetable;
use App\Http\Requests\Admin\Timetable\IndexTimetable;
use App\Http\Requests\Admin\Timetable\StoreTimetable;
use App\Http\Requests\Admin\Timetable\UpdateTimetable;
use App\Models\Timetable;
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

class TimetablesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexTimetable $request
     * @return array|Factory|View
     */
    public function index(IndexTimetable $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Timetable::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'lesson_id', 'student_id', 'teacher_id', 'date', 'start_time', 'finish_time'],

            // set columns to searchIn
            ['id', 'lesson_id', 'student_id', 'teacher_id'],

            function ($query) use ($request) {
                $query->with(['lesson', 'teacher', 'student']);
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

        return view('admin.timetable.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.timetable.create');

        return view('admin.timetable.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreTimetable $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreTimetable $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Timetable
        $timetable = Timetable::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/timetables'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/timetables');
    }

    /**
     * Display the specified resource.
     *
     * @param Timetable $timetable
     * @throws AuthorizationException
     * @return void
     */
    public function show(Timetable $timetable)
    {
        $this->authorize('admin.timetable.show', $timetable);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Timetable $timetable
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Timetable $timetable)
    {
        $this->authorize('admin.timetable.edit', $timetable);


        return view('admin.timetable.edit', [
            'timetable' => $timetable,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateTimetable $request
     * @param Timetable $timetable
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateTimetable $request, Timetable $timetable)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Timetable
        $timetable->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/timetables'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/timetables');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyTimetable $request
     * @param Timetable $timetable
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyTimetable $request, Timetable $timetable)
    {
        $timetable->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyTimetable $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyTimetable $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Timetable::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
