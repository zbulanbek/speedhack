<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PurchaseCourseClass\BulkDestroyPurchaseCourseClass;
use App\Http\Requests\Admin\PurchaseCourseClass\DestroyPurchaseCourseClass;
use App\Http\Requests\Admin\PurchaseCourseClass\IndexPurchaseCourseClass;
use App\Http\Requests\Admin\PurchaseCourseClass\StorePurchaseCourseClass;
use App\Http\Requests\Admin\PurchaseCourseClass\UpdatePurchaseCourseClass;
use App\Models\PurchaseCourseClass;
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

class PurchaseCourseClassesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexPurchaseCourseClass $request
     * @return array|Factory|View
     */
    public function index(IndexPurchaseCourseClass $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(PurchaseCourseClass::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'user_id', 'course_class_id', 'is_approved'],

            // set columns to searchIn
            ['id']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.purchase-course-class.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.purchase-course-class.create');

        return view('admin.purchase-course-class.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StorePurchaseCourseClass $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StorePurchaseCourseClass $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the PurchaseCourseClass
        $purchaseCourseClass = PurchaseCourseClass::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/purchase-course-classes'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/purchase-course-classes');
    }

    /**
     * Display the specified resource.
     *
     * @param PurchaseCourseClass $purchaseCourseClass
     * @throws AuthorizationException
     * @return void
     */
    public function show(PurchaseCourseClass $purchaseCourseClass)
    {
        $this->authorize('admin.purchase-course-class.show', $purchaseCourseClass);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param PurchaseCourseClass $purchaseCourseClass
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(PurchaseCourseClass $purchaseCourseClass)
    {
        $this->authorize('admin.purchase-course-class.edit', $purchaseCourseClass);


        return view('admin.purchase-course-class.edit', [
            'purchaseCourseClass' => $purchaseCourseClass,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdatePurchaseCourseClass $request
     * @param PurchaseCourseClass $purchaseCourseClass
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdatePurchaseCourseClass $request, PurchaseCourseClass $purchaseCourseClass)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values PurchaseCourseClass
        $purchaseCourseClass->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/purchase-course-classes'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/purchase-course-classes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyPurchaseCourseClass $request
     * @param PurchaseCourseClass $purchaseCourseClass
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyPurchaseCourseClass $request, PurchaseCourseClass $purchaseCourseClass)
    {
        $purchaseCourseClass->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyPurchaseCourseClass $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyPurchaseCourseClass $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    PurchaseCourseClass::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
