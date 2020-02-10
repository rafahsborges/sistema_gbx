<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Etapa\BulkDestroyEtapa;
use App\Http\Requests\Admin\Etapa\DestroyEtapa;
use App\Http\Requests\Admin\Etapa\IndexEtapa;
use App\Http\Requests\Admin\Etapa\StoreEtapa;
use App\Http\Requests\Admin\Etapa\UpdateEtapa;
use App\Models\Etapa;
use App\Models\Servico;
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

class EtapasController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexEtapa $request
     * @return array|Factory|View
     */
    public function index(IndexEtapa $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Etapa::class)->processRequestAndGet(
        // pass the request with params
            $request,

            // set columns to query
            ['id', 'nome', 'id_servico', 'id_status'],

            // set columns to searchIn
            ['id', 'nome', 'id_servico'],

            function ($query) use ($request) {
                $query->with(['status']);
                $query->with(['servico']);
                if ($request->has('statuses')) {
                    $query->whereIn('id_status', $request->get('statuses'));
                }
                if ($request->has('servicos')) {
                    $query->whereIn('id_servico', $request->get('servicos'));
                }
            }
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.etapa.index', [
            'data' => $data,
            'statuses' => Status::all(),
            'servicos' => Servico::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     * @throws AuthorizationException
     */
    public function create()
    {
        //$this->authorize('admin.etapa.create');

        return view('admin.etapa.create', [
            'statuses' => Status::all(),
            'servicos' => Servico::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreEtapa $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreEtapa $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();
        $sanitized['id_status'] = $request->getStatusId();
        $sanitized['id_servico'] = $request->getServicoId();

        // Store the Etapa
        $etapa = Etapa::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/etapas'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/etapas');
    }

    /**
     * Display the specified resource.
     *
     * @param Etapa $etapa
     * @return void
     * @throws AuthorizationException
     */
    public function show(Etapa $etapa)
    {
        $this->authorize('admin.etapa.show', $etapa);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Etapa $etapa
     * @return Factory|View
     * @throws AuthorizationException
     */
    public function edit(Etapa $etapa)
    {
        //$this->authorize('admin.etapa.edit', $etapa);

        $etapa = Etapa::with('status')
            ->find($etapa->id);

        return view('admin.etapa.edit', [
            'etapa' => $etapa,
            'statuses' => Status::all(),
            'servicos' => Servico::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateEtapa $request
     * @param Etapa $etapa
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateEtapa $request, Etapa $etapa)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();
        $sanitized['id_status'] = $request->getStatusId();
        $sanitized['id_servico'] = $request->getServicoId();

        // Update changed values Etapa
        $etapa->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/etapas'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/etapas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyEtapa $request
     * @param Etapa $etapa
     * @return ResponseFactory|RedirectResponse|Response
     * @throws Exception
     */
    public function destroy(DestroyEtapa $request, Etapa $etapa)
    {
        $etapa->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyEtapa $request
     * @return Response|bool
     * @throws Exception
     */
    public function bulkDestroy(BulkDestroyEtapa $request): Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    DB::table('etapas')->whereIn('id', $bulkChunk)
                        ->update([
                            'deleted_at' => Carbon::now()->format('Y-m-d H:i:s')
                        ]);

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
