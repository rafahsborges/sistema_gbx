<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Status\BulkDestroyStatus;
use App\Http\Requests\Admin\Status\DestroyStatus;
use App\Http\Requests\Admin\Status\IndexStatus;
use App\Http\Requests\Admin\Status\StoreStatus;
use App\Http\Requests\Admin\Status\UpdateStatus;
use App\Models\Status;
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

class StatusController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexStatus $request
     * @return array|Factory|View
     */
    public function index(IndexStatus $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Status::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'nome'],

            // set columns to searchIn
            ['id', 'nome']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.status.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        //$this->authorize('admin.status.create');

        return view('admin.status.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreStatus $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreStatus $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Status
        $status = Status::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/status'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/status');
    }

    /**
     * Display the specified resource.
     *
     * @param Status $status
     * @throws AuthorizationException
     * @return void
     */
    public function show(Status $status)
    {
        $this->authorize('admin.status.show', $status);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Status $status
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Status $status)
    {
        //$this->authorize('admin.status.edit', $status);

        return view('admin.status.edit', [
            'status' => $status,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateStatus $request
     * @param Status $status
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateStatus $request, Status $status)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Status
        $status->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/status'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/status');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyStatus $request
     * @param Status $status
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyStatus $request, Status $status)
    {
        $status->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyStatus $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyStatus $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    DB::table('status')->whereIn('id', $bulkChunk)
                        ->update([
                            'deleted_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ]);

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
