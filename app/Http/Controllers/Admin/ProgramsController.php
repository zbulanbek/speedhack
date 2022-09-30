<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Program\BulkDestroyProgram;
use App\Http\Requests\Admin\Program\DestroyProgram;
use App\Http\Requests\Admin\Program\IndexProgram;
use App\Http\Requests\Admin\Program\StoreProgram;
use App\Http\Requests\Admin\Program\UpdateProgram;
use App\Models\Program;
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

class ProgramsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexProgram $request
     * @return array|Factory|View
     */
    public function index(IndexProgram $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Program::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'title', 'homeworks', 'course_id'],

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

        return view('admin.program.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.program.create');

        return view('admin.program.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreProgram $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreProgram $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Program
        $program = Program::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/programs'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/programs');
    }

    /**
     * Display the specified resource.
     *
     * @param Program $program
     * @throws AuthorizationException
     * @return void
     */
    public function show(Program $program)
    {
        $this->authorize('admin.program.show', $program);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Program $program
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Program $program)
    {
        $this->authorize('admin.program.edit', $program);


        return view('admin.program.edit', [
            'program' => $program,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateProgram $request
     * @param Program $program
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateProgram $request, Program $program)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Program
        $program->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/programs'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/programs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyProgram $request
     * @param Program $program
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyProgram $request, Program $program)
    {
        $program->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyProgram $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyProgram $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Program::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
