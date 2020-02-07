<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Servico\BulkDestroyServico;
use App\Http\Requests\Admin\Servico\DestroyServico;
use App\Http\Requests\Admin\Servico\IndexServico;
use App\Http\Requests\Admin\Servico\StoreServico;
use App\Http\Requests\Admin\Servico\UpdateServico;
use App\Models\Etapa;
use App\Models\Item;
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
            ['id', 'nome', 'orgao', 'descricao'],

            function ($query) use ($request) {
                $query->with(['status']);
                $query->with(['etapa']);
                if ($request->has('statuses')) {
                    $query->whereIn('id_status', $request->get('statuses'));
                }
                if ($request->has('etapas')) {
                    $query->whereIn('id_etapa', $request->get('etapas'));
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

        return view('admin.servico.index', [
            'data' => $data,
            'statuses' => Status::all(),
            'etapas' => Etapa::all(),
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
        //$this->authorize('admin.servico.create');

        return view('admin.servico.create', [
            'statuses' => Status::all(),
            'etapas' => Etapa::all(),
        ]);
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
        $sanitized['id_status'] = $request->getStatusId();
        $sanitized['id_etapa'] = $request->getEtapaId();
        $sanitized['valor'] = $request->prepareCurrencies($sanitized['valor']);

        $etapas = [];
        $itens = [];

        $etapasList = $sanitized['etapas'];

        if ($etapasList) {
            foreach ($etapasList as $etapa) {
                $itensList = $etapa['itens'];
                $etapa['id_status'] = $etapa['status']['id'];
                $etapa['created_at'] = Carbon::now();
                $etapa['updated_at'] = Carbon::now();
                // Store Etapa
                $etapa = (new Etapa)->create($etapa);
                if ($itensList) {
                    foreach ($itensList as $item) {
                        $item['id_status'] = $item['status']['id'];
                        $item['id_etapa'] = $etapa->id;
                        $item['created_at'] = Carbon::now();
                        $item['updated_at'] = Carbon::now();
                        // Store Etapa
                        $itens[] = (new Item)->create($item);
                    }
                }
                $etapas[] = $etapa;
            }
        }

        // Store the Servico
        $servico = (new Servico)->create($sanitized);

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
        //$this->authorize('admin.servico.edit', $servico);

        $id = $servico->id;

        $servico = Servico::with('status')
            ->with('etapa')
            ->find($id);

        return view('admin.servico.edit', [
            'servico' => $servico,
            'statuses' => Status::all(),
            'etapas' => Etapa::all(),
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
        $sanitized['id_status'] = $request->getStatusId();
        $sanitized['id_etapa'] = $request->getEtapaId();
        $sanitized['valor'] = $request->prepareCurrencies($sanitized['valor']);

        $etapas = [];
        $itens = [];

        $etapasList = $sanitized['etapas'];

        if ($etapasList) {
            foreach ($etapasList as $etapa) {
                $itensList = $etapa['itens'];
                $etapa['id_status'] = $etapa['status']['id'];
                $etapa['created_at'] = Carbon::now();
                $etapa['updated_at'] = Carbon::now();
                // Store Etapa
                $etapa = (new Etapa)->create($etapa);
                if ($itensList) {
                    foreach ($itensList as $item) {
                        $item['id_status'] = $item['status']['id'];
                        $item['id_etapa'] = $etapa->id;
                        $item['created_at'] = Carbon::now();
                        $item['updated_at'] = Carbon::now();
                        // Store Etapa
                        $itens[] = (new Item)->create($item);
                    }
                }
                $etapas[] = $etapa;
            }
        }

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
