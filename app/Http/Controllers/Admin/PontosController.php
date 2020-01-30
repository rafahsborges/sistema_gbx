<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Ponto\BulkDestroyPonto;
use App\Http\Requests\Admin\Ponto\DestroyPonto;
use App\Http\Requests\Admin\Ponto\IndexPonto;
use App\Http\Requests\Admin\Ponto\StorePonto;
use App\Http\Requests\Admin\Ponto\UpdatePonto;
use App\Models\AdminUser;
use App\Models\Ponto;
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

class PontosController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexPonto $request
     * @return array|Factory|View
     */
    public function index(IndexPonto $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Ponto::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'nome', 'logradouro', 'numero', 'complemento', 'bairro', 'cidade', 'uf', 'cep', 'estacao', 'entidade', 'latitude', 'longitude', 'altura', 'id_cliente'],

            // set columns to searchIn
            ['id', 'nome', 'logradouro', 'numero', 'complemento', 'bairro', 'cidade', 'uf', 'cep', 'estacao', 'entidade', 'latitude', 'longitude', 'altura'],

            function ($query) use ($request) {
                $query->with(['cliente']);
                if($request->has('clientes')){
                    $query->whereIn('id_cliente', $request->get('clientes'));
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

        return view('admin.ponto.index', [
            'data' => $data,
            'clientes' => AdminUser::all(),
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
        $this->authorize('admin.ponto.create');

        return view('admin.ponto.create', [
            'clientes' => AdminUser::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StorePonto $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StorePonto $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();
        $sanitized['id_cliente'] = $request->getClienteId();
        $sanitized['uf'] = $request->getUfId();

        // Store the Ponto
        $ponto = Ponto::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/pontos'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/pontos');
    }

    /**
     * Display the specified resource.
     *
     * @param Ponto $ponto
     * @throws AuthorizationException
     * @return void
     */
    public function show(Ponto $ponto)
    {
        $this->authorize('admin.ponto.show', $ponto);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Ponto $ponto
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Ponto $ponto)
    {
        $this->authorize('admin.ponto.edit', $ponto);


        return view('admin.ponto.edit', [
            'ponto' => $ponto,
            'clientes' => AdminUser::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdatePonto $request
     * @param Ponto $ponto
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdatePonto $request, Ponto $ponto)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();
        $sanitized['id_cliente'] = $request->getClienteId();
        $sanitized['uf'] = $request->getUfId();

        // Update changed values Ponto
        $ponto->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/pontos'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/pontos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyPonto $request
     * @param Ponto $ponto
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyPonto $request, Ponto $ponto)
    {
        $ponto->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyPonto $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyPonto $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    DB::table('pontos')->whereIn('id', $bulkChunk)
                        ->update([
                            'deleted_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ]);

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
