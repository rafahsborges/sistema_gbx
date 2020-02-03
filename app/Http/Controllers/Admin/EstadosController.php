<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Estado\BulkDestroyEstado;
use App\Http\Requests\Admin\Estado\DestroyEstado;
use App\Http\Requests\Admin\Estado\IndexEstado;
use App\Http\Requests\Admin\Estado\StoreEstado;
use App\Http\Requests\Admin\Estado\UpdateEstado;
use App\Models\Estado;
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

class EstadosController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexEstado $request
     * @return array|Factory|View
     */
    public function index(IndexEstado $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Estado::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'nome', 'abreviacao', 'enabled'],

            // set columns to searchIn
            ['id', 'nome', 'abreviacao']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.estado.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.estado.create');

        return view('admin.estado.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreEstado $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreEstado $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Estado
        $estado = Estado::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/estados'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/estados');
    }

    /**
     * Display the specified resource.
     *
     * @param Estado $estado
     * @throws AuthorizationException
     * @return void
     */
    public function show(Estado $estado)
    {
        $this->authorize('admin.estado.show', $estado);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Estado $estado
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Estado $estado)
    {
        $this->authorize('admin.estado.edit', $estado);


        return view('admin.estado.edit', [
            'estado' => $estado,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateEstado $request
     * @param Estado $estado
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateEstado $request, Estado $estado)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Estado
        $estado->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/estados'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/estados');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyEstado $request
     * @param Estado $estado
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyEstado $request, Estado $estado)
    {
        $estado->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyEstado $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyEstado $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    DB::table('estados')->whereIn('id', $bulkChunk)
                        ->update([
                            'deleted_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ]);

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
