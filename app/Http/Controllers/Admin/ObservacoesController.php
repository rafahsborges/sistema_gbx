<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Observacao\BulkDestroyObservacao;
use App\Http\Requests\Admin\Observacao\DestroyObservacao;
use App\Http\Requests\Admin\Observacao\IndexObservacao;
use App\Http\Requests\Admin\Observacao\StoreObservacao;
use App\Http\Requests\Admin\Observacao\UpdateObservacao;
use App\Models\Observacao;
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
     * @param IndexObservacao $request
     * @return array|Factory|View
     */
    public function index(IndexObservacao $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Observacao::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'id_cliente'],

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

        return view('admin.observacao.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.observacao.create');

        return view('admin.observacao.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreObservacao $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreObservacao $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Observacao
        $observaco = Observacao::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/observacoes'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/observacoes');
    }

    /**
     * Display the specified resource.
     *
     * @param Observacao $observaco
     * @throws AuthorizationException
     * @return void
     */
    public function show(Observacao $observaco)
    {
        $this->authorize('admin.observacao.show', $observaco);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Observacao $observaco
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Observacao $observaco)
    {
        $this->authorize('admin.observacao.edit', $observaco);


        return view('admin.observacao.edit', [
            'observacao' => $observaco,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateObservacao $request
     * @param Observacao $observaco
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateObservacao $request, Observacao $observaco)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Observacao
        $observaco->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/observacoes'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/observacoes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyObservacao $request
     * @param Observacao $observaco
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyObservacao $request, Observacao $observaco)
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
     * @param BulkDestroyObservacao $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyObservacao $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    DB::table('observacoes')->whereIn('id', $bulkChunk)
                        ->update([
                            'deleted_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ]);

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
