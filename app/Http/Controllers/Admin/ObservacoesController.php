<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Observaco\BulkDestroyObservaco;
use App\Http\Requests\Admin\Observaco\DestroyObservaco;
use App\Http\Requests\Admin\Observaco\IndexObservaco;
use App\Http\Requests\Admin\Observaco\StoreObservaco;
use App\Http\Requests\Admin\Observaco\UpdateObservaco;
use App\Models\Observaco;
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

class ObservacoesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexObservaco $request
     * @return array|Factory|View
     */
    public function index(IndexObservaco $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Observaco::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id'],

            // set columns to searchIn
            ['id', 'descricao']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.observaco.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.observaco.create');

        return view('admin.observaco.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreObservaco $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreObservaco $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Observaco
        $observaco = Observaco::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/observacos'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/observacos');
    }

    /**
     * Display the specified resource.
     *
     * @param Observaco $observaco
     * @throws AuthorizationException
     * @return void
     */
    public function show(Observaco $observaco)
    {
        $this->authorize('admin.observaco.show', $observaco);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Observaco $observaco
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Observaco $observaco)
    {
        $this->authorize('admin.observaco.edit', $observaco);


        return view('admin.observaco.edit', [
            'observaco' => $observaco,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateObservaco $request
     * @param Observaco $observaco
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateObservaco $request, Observaco $observaco)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Observaco
        $observaco->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/observacos'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/observacos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyObservaco $request
     * @param Observaco $observaco
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyObservaco $request, Observaco $observaco)
    {
        $observaco->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyObservaco $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyObservaco $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    DB::table('observacos')->whereIn('id', $bulkChunk)
                        ->update([
                            'deleted_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ]);

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
