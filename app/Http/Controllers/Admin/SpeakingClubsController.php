<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SpeakingClub\BulkDestroySpeakingClub;
use App\Http\Requests\Admin\SpeakingClub\DestroySpeakingClub;
use App\Http\Requests\Admin\SpeakingClub\IndexSpeakingClub;
use App\Http\Requests\Admin\SpeakingClub\StoreSpeakingClub;
use App\Http\Requests\Admin\SpeakingClub\UpdateSpeakingClub;
use App\Models\SpeakingClub;
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

class SpeakingClubsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexSpeakingClub $request
     * @return array|Factory|View
     */
    public function index(IndexSpeakingClub $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(SpeakingClub::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            [''],

            // set columns to searchIn
            ['']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.speaking-club.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.speaking-club.create');

        return view('admin.speaking-club.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreSpeakingClub $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreSpeakingClub $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the SpeakingClub
        $speakingClub = SpeakingClub::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/speaking-clubs'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/speaking-clubs');
    }

    /**
     * Display the specified resource.
     *
     * @param SpeakingClub $speakingClub
     * @throws AuthorizationException
     * @return void
     */
    public function show(SpeakingClub $speakingClub)
    {
        $this->authorize('admin.speaking-club.show', $speakingClub);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param SpeakingClub $speakingClub
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(SpeakingClub $speakingClub)
    {
        $this->authorize('admin.speaking-club.edit', $speakingClub);


        return view('admin.speaking-club.edit', [
            'speakingClub' => $speakingClub,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateSpeakingClub $request
     * @param SpeakingClub $speakingClub
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateSpeakingClub $request, SpeakingClub $speakingClub)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values SpeakingClub
        $speakingClub->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/speaking-clubs'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/speaking-clubs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroySpeakingClub $request
     * @param SpeakingClub $speakingClub
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroySpeakingClub $request, SpeakingClub $speakingClub)
    {
        $speakingClub->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroySpeakingClub $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroySpeakingClub $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    SpeakingClub::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
