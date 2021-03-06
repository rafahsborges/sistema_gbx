<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Informativo\BulkDestroyInformativo;
use App\Http\Requests\Admin\Informativo\DestroyInformativo;
use App\Http\Requests\Admin\Informativo\IndexInformativo;
use App\Http\Requests\Admin\Informativo\StoreInformativo;
use App\Http\Requests\Admin\Informativo\UpdateInformativo;
use App\Models\Informativo;
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

class InformativosController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexInformativo $request
     * @return array|Factory|View
     */
    public function index(IndexInformativo $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Informativo::class)->processRequestAndGet(
        // pass the request with params
            $request,

            // set columns to query
            ['id', 'assunto', 'id_servico'],

            // set columns to searchIn
            ['id', 'assunto', 'conteudo', 'id_servico'],

            function ($query) use ($request) {
                $query->with(['servico']);
                if ($request->has('servicos')) {
                    $query->whereIn('id_servico', $request->get('servicos'));
                }
                if(auth()->user()->is_admin !== 1){
                    $query->where('id_servico', auth()->user()->id_servico);
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

        return view('admin.informativo.index', [
            'data' => $data,
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
        $this->authorize('admin.informativo.create');

        return view('admin.informativo.create', [
            'servicos' => Servico::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreInformativo $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreInformativo $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();
        $sanitized['id_servico'] = $request->getServicoId();

        // Store the Informativo
        $informativo = Informativo::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/informativos'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/informativos');
    }

    /**
     * Display the specified resource.
     *
     * @param Informativo $informativo
     * @return void
     * @throws AuthorizationException
     */
    public function show(Informativo $informativo)
    {
        $this->authorize('admin.informativo.show', $informativo);

        $id = $informativo->id;

        $informativo = Informativo::with('servico')
            ->find($id);

        return view('admin.informativo.show', [
            'informativo' => $informativo,
            'servicos' => Servico::all(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Informativo $informativo
     * @return Factory|View
     * @throws AuthorizationException
     */
    public function edit(Informativo $informativo)
    {
        $this->authorize('admin.informativo.edit', $informativo);

        $id = $informativo->id;

        $informativo = Informativo::with('servico')
            ->find($id);

        return view('admin.informativo.edit', [
            'informativo' => $informativo,
            'servicos' => Servico::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateInformativo $request
     * @param Informativo $informativo
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateInformativo $request, Informativo $informativo)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();
        $sanitized['id_servico'] = $request->getServicoId();

        // Update changed values Informativo
        $informativo->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/informativos'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/informativos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyInformativo $request
     * @param Informativo $informativo
     * @return ResponseFactory|RedirectResponse|Response
     * @throws Exception
     */
    public function destroy(DestroyInformativo $request, Informativo $informativo)
    {
        $informativo->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyInformativo $request
     * @return Response|bool
     * @throws Exception
     */
    public function bulkDestroy(BulkDestroyInformativo $request): Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    DB::table('informativos')->whereIn('id', $bulkChunk)
                        ->update([
                            'deleted_at' => Carbon::now()->format('Y-m-d H:i:s')
                        ]);

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
