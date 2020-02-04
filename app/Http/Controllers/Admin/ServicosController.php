<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Servico\BulkDestroyServico;
use App\Http\Requests\Admin\Servico\DestroyServico;
use App\Http\Requests\Admin\Servico\IndexServico;
use App\Http\Requests\Admin\Servico\StoreServico;
use App\Http\Requests\Admin\Servico\UpdateServico;
use App\Models\Servico;
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

class ServicosController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexServico $request
     * @return array|Factory|View
     */
    public function index(IndexServico $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Servico::class)->processRequestAndGet(
        // pass the request with params
            $request,

            // set columns to query
            ['id', 'nome', 'valor', 'orgao', 'id_etapa', 'id_status'],

            // set columns to searchIn
            ['id', 'nome', 'orgao', 'descricao']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.servico.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     * @throws AuthorizationException
     */
    public function create()
    {
        $this->authorize('admin.servico.create');

        return view('admin.servico.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreServico $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreServico $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Servico
        $servico = Servico::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/servicos'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/servicos');
    }

    /**
     * Display the specified resource.
     *
     * @param Servico $servico
     * @return void
     * @throws AuthorizationException
     */
    public function show(Servico $servico)
    {
        $this->authorize('admin.servico.show', $servico);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Servico $servico
     * @return Factory|View
     * @throws AuthorizationException
     */
    public function edit(Servico $servico)
    {
        $this->authorize('admin.servico.edit', $servico);


        return view('admin.servico.edit', [
            'servico' => $servico,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateServico $request
     * @param Servico $servico
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateServico $request, Servico $servico)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Servico
        $servico->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/servicos'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/servicos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyServico $request
     * @param Servico $servico
     * @return ResponseFactory|RedirectResponse|Response
     * @throws Exception
     */
    public function destroy(DestroyServico $request, Servico $servico)
    {
        $servico->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyServico $request
     * @return Response|bool
     * @throws Exception
     */
    public function bulkDestroy(BulkDestroyServico $request): Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    DB::table('servicos')->whereIn('id', $bulkChunk)
                        ->update([
                            'deleted_at' => Carbon::now()->format('Y-m-d H:i:s')
                        ]);

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
