<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Certificate\BulkDestroyCertificate;
use App\Http\Requests\Admin\Certificate\DestroyCertificate;
use App\Http\Requests\Admin\Certificate\IndexCertificate;
use App\Http\Requests\Admin\Certificate\StoreCertificate;
use App\Http\Requests\Admin\Certificate\UpdateCertificate;
use App\Models\{Certificate, Course};
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

class CertificatesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexCertificate $request
     * @return array|Factory|View
     */
    public function index(IndexCertificate $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Certificate::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'title', 'course_id'],

            // set columns to searchIn
            ['id', 'title', 'image', 'body']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.certificate.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.certificate.create');
        $courses = Course::all();
        return view('admin.certificate.create', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreCertificate $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreCertificate $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Certificate
        $certificate = Certificate::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/certificates'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/certificates');
    }

    /**
     * Display the specified resource.
     *
     * @param Certificate $certificate
     * @throws AuthorizationException
     * @return void
     */
    public function show(Certificate $certificate)
    {
        $this->authorize('admin.certificate.show', $certificate);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Certificate $certificate
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Certificate $certificate)
    {
        $this->authorize('admin.certificate.edit', $certificate);
        $courses = Course::all();

        return view('admin.certificate.edit', [
            'certificate' => $certificate,
            'courses' => $courses
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateCertificate $request
     * @param Certificate $certificate
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateCertificate $request, Certificate $certificate)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Certificate
        $certificate->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/certificates'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/certificates');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyCertificate $request
     * @param Certificate $certificate
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyCertificate $request, Certificate $certificate)
    {
        $certificate->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyCertificate $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyCertificate $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Certificate::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
