<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Orcamento\BulkDestroyOrcamento;
use App\Http\Requests\Admin\Orcamento\DestroyOrcamento;
use App\Http\Requests\Admin\Orcamento\IndexOrcamento;
use App\Http\Requests\Admin\Orcamento\StoreOrcamento;
use App\Http\Requests\Admin\Orcamento\UpdateOrcamento;
use App\Jobs\SendMailJob;
use App\Mail\NewOrcamentos;
use App\Models\Cidade;
use App\Models\Estado;
use App\Models\Orcamento;
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

class OrcamentosController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexOrcamento $request
     * @return array|Factory|View
     */
    public function index(IndexOrcamento $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Orcamento::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'tipo', 'nome', 'razao_social', 'cpf', 'cnpj', 'email', 'email2', 'email3', 'telefone', 'celular', 'id_cidade', 'id_estado', 'assunto', 'enviar', 'agendar', 'agendamento', 'enviado', 'envio'],

            // set columns to searchIn
            ['id', 'nome', 'razao_social', 'cpf', 'cnpj', 'email', 'email2', 'email3', 'telefone', 'celular', 'assunto', 'conteudo']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.orcamento.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.orcamento.create');

        return view('admin.orcamento.create', [
            'estados' => Estado::all(),
            'cidades' => Cidade::all(),
            'mode' => 'create',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreOrcamento $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreOrcamento $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();
        $sanitized['id_estado'] = $request->getEstadoId();
        $sanitized['id_cidade'] = $request->getCidadeId();

        if (!$sanitized['enviar'] && $sanitized['agendar']) {
            $sanitized['agendamento'] = Carbon::create($sanitized['agendamento']);
        } else {
            $sanitized['agendamento'] = Carbon::now();
        }

        // Store the Orcamento
        $orcamento = Orcamento::create($sanitized);

        if ($sanitized['enviar'] && $sanitized['agendamento']->isPast()) {
            $orcamento->enviado = true;
            $orcamento->envio = Carbon::now();
            $orcamento->save();

            dispatch(new SendMailJob($sanitized['email'], new NewOrcamentos($sanitized['nome'], $orcamento)));
        }

        if ($request->ajax()) {
            return ['redirect' => url('admin/orcamentos'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/orcamentos');
    }

    /**
     * Display the specified resource.
     *
     * @param Orcamento $orcamento
     * @throws AuthorizationException
     * @return void
     */
    public function show(Orcamento $orcamento)
    {
        $this->authorize('admin.orcamento.show', $orcamento);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Orcamento $orcamento
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Orcamento $orcamento)
    {
        $this->authorize('admin.orcamento.edit', $orcamento);

        return view('admin.orcamento.edit', [
            'orcamento' => $orcamento,
            'estados' => Estado::all(),
            'cidades' => Cidade::all(),
            'mode' => 'edit',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateOrcamento $request
     * @param Orcamento $orcamento
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateOrcamento $request, Orcamento $orcamento)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();
        $sanitized['id_estado'] = $request->getEstadoId();
        $sanitized['id_cidade'] = $request->getCidadeId();

        // Update changed values Orcamento
        $orcamento->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/orcamentos'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/orcamentos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyOrcamento $request
     * @param Orcamento $orcamento
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyOrcamento $request, Orcamento $orcamento)
    {
        $orcamento->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyOrcamento $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyOrcamento $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    DB::table('orcamentos')->whereIn('id', $bulkChunk)
                        ->update([
                            'deleted_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ]);

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
