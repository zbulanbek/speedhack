<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Feedback\BulkDestroyFeedback;
use App\Http\Requests\Admin\Feedback\DestroyFeedback;
use App\Http\Requests\Admin\Feedback\IndexFeedback;
use App\Http\Requests\Admin\Feedback\StoreFeedback;
use App\Http\Requests\Admin\Feedback\UpdateFeedback;
use App\Models\{Feedback, Course};
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

class FeedbackController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexFeedback $request
     * @return array|Factory|View
     */
    public function index(IndexFeedback $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Feedback::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'name', 'rate', 'course_id'],

            // set columns to searchIn
            ['id', 'name', 'image', 'text']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.feedback.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.feedback.create');
         $courses = Course::all();
        return view('admin.feedback.create', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreFeedback $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreFeedback $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Feedback
        $feedback = Feedback::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/feedback'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/feedback');
    }

    /**
     * Display the specified resource.
     *
     * @param Feedback $feedback
     * @throws AuthorizationException
     * @return void
     */
    public function show(Feedback $feedback)
    {
        $this->authorize('admin.feedback.show', $feedback);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Feedback $feedback
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Feedback $feedback)
    {
        $this->authorize('admin.feedback.edit', $feedback);
        $courses = Course::all();

        return view('admin.feedback.edit', [
            'feedback' => $feedback,
            'courses' => $courses
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateFeedback $request
     * @param Feedback $feedback
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateFeedback $request, Feedback $feedback)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Feedback
        $feedback->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/feedback'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/feedback');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyFeedback $request
     * @param Feedback $feedback
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyFeedback $request, Feedback $feedback)
    {
        $feedback->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyFeedback $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyFeedback $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Feedback::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
