<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Mode\BulkDestroyMode;
use App\Http\Requests\Admin\Mode\DestroyMode;
use App\Http\Requests\Admin\Mode\IndexMode;
use App\Http\Requests\Admin\Mode\StoreMode;
use App\Http\Requests\Admin\Mode\UpdateMode;
use App\Models\{Mode, User, Notification};
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

class ModesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexMode $request
     * @return array|Factory|View
     */
    public function index(IndexMode $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Mode::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'user_id', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'],

            // set columns to searchIn
            ['id', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'],

            function ($query) use ($request) {
                $query->with(['user']);
            }
        );

        $notices = Notification::where('key','mode')->where('is_read', false)->with(['from'])->get();
       
        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return [
                'data' => $data,
                'notices' => $notices,
            ];
        }
        $data->map(function ($item, $key) {
            $week = '';
            if($item->monday){
               foreach (json_decode($item->monday) as $value) {
                    $week = $week . $value->start .' - '.$value->end . '; ';
                } 
                $item->monday = $week;
            }
            
            $week = '';
            if($item->tuesday){
               foreach (json_decode($item->tuesday) as $value) {
                    $week = $week . $value->start .' - '.$value->end . '; ';
                } 
                $item->tuesday = $week;
            }

            $week = '';
            if($item->wednesday){
               foreach (json_decode($item->wednesday) as $value) {
                    $week = $week . $value->start .' - '.$value->end . '; ';
                } 
                $item->wednesday = $week;
            }

            $week = '';
            if($item->thursday){
               foreach (json_decode($item->thursday) as $value) {
                    $week = $week . $value->start .' - '.$value->end . '; ';
                } 
                $item->thursday = $week;
            }

            $week = '';
            if($item->friday){
               foreach (json_decode($item->friday) as $value) {
                    $week = $week . $value->start .' - '.$value->end . '; ';
                } 
                $item->friday = $week;
            }

            $week = '';
            if($item->saturday){
               foreach (json_decode($item->saturday) as $value) {
                    $week = $week . $value->start .' - '.$value->end . '; ';
                } 
                $item->saturday = $week;
            }

            $week = '';
            if($item->sunday){
               foreach (json_decode($item->sunday) as $value) {
                    $week = $week . $value->start .' - '.$value->end . '; ';
                } 
                $item->sunday = $week;
            }
        });
       
        return view('admin.mode.index', [
            'data' => $data,
            'notices' => $notices,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $metodists = User::where('role_id', 4)->get();
        $mode = [
            'user_id'=>null,
            'monday' => null,
            'tuesday' =>null,
            'wednesday' =>null,
            'thursday' =>null,
            'friday' =>null,
            'saturday' =>null,
            'sunday' =>null,
        ];

        $this->authorize('admin.mode.create');

       

        return view('admin.mode.create', [
            
            'metodists'=>$metodists
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreMode $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreMode $request)
    {
        
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Mode
        //$mode = Mode::create($sanitized);

        $mode = Mode::create(array(
            'user_id' => $request->form['user_id'],
            'monday' => $request->form['monday'],
            'tuesday' => $request->form['tuesday'],
            'wednesday' => $request->form['wednesday'],
            'thursday' => $request->form['thursday'],
            'friday' => $request->form['friday'],
            'saturday' => $request->form['saturday'],
            'sunday' => $request->form['sunday'],
        ));

        if ($request->ajax()) {
            return ['redirect' => url('admin/modes'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/modes');
    }

    /**
     * Display the specified resource.
     *
     * @param Mode $mode
     * @throws AuthorizationException
     * @return void
     */
    public function show(Mode $mode)
    {
        $this->authorize('admin.mode.show', $mode);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Mode $mode
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Mode $mode)
    {
        $mode->with(['user']);
        $this->authorize('admin.mode.edit', $mode);
        $metodists = User::where('role_id', 4)->get();

        return view('admin.mode.edit', [
            'mode' => $mode,
            'metodists'=>$metodists
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateMode $request
     * @param Mode $mode
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateMode $request, Mode $mode)
    {
        
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Mode
        //$mode->update($sanitized);

        $mode->update([
            'user_id' => $request->form['user_id'],
            'monday' => $request->form['monday'],
            'tuesday' => $request->form['tuesday'],
            'wednesday' => $request->form['wednesday'],
            'thursday' => $request->form['thursday'],
            'friday' => $request->form['friday'],
            'saturday' => $request->form['saturday'],
            'sunday' => $request->form['sunday'],
        ]);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/modes'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/modes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyMode $request
     * @param Mode $mode
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyMode $request, Mode $mode)
    {
        $mode->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyMode $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyMode $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Mode::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
