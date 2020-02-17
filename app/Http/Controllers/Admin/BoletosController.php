<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Boleto\BulkDestroyBoleto;
use App\Http\Requests\Admin\Boleto\DestroyBoleto;
use App\Http\Requests\Admin\Boleto\IndexBoleto;
use App\Http\Requests\Admin\Boleto\StoreBoleto;
use App\Http\Requests\Admin\Boleto\UpdateBoleto;
use App\Models\AdminUser;
use App\Models\Boleto;
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

class BoletosController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexBoleto $request
     * @return array|Factory|View
     */
    public function index(IndexBoleto $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Boleto::class)->processRequestAndGet(
        // pass the request with params
            $request,

            // set columns to query
            ['id', 'valor', 'vencimento', 'valor_pago', 'pagamento', 'id_cliente', 'status'],

            // set columns to searchIn
            ['id'],

            function ($query) use ($request) {
                $query->with(['cliente']);
                if ($request->has('clientes')) {
                    $query->whereIn('id_cliente', $request->get('clientes'));
                }
                if (auth()->user()->is_admin !== 1) {
                    $query->where('id_cliente', auth()->user()->id);
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

        return view('admin.boleto.index', [
            'data' => $data,
            'clientes' => AdminUser::all(),
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
        //$this->authorize('admin.boleto.create');

        return view('admin.boleto.create', [
            'clientes' => AdminUser::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreBoleto $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreBoleto $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();
        $sanitized['id_cliente'] = $request->getClienteId();

        // Store the Boleto
        $boleto = Boleto::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/boletos'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/boletos');
    }

    /**
     * Display the specified resource.
     *
     * @param Boleto $boleto
     * @return void
     * @throws AuthorizationException
     */
    public function show(Boleto $boleto)
    {
        $this->authorize('admin.boleto.show', $boleto);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Boleto $boleto
     * @return Factory|View
     * @throws AuthorizationException
     */
    public function edit(Boleto $boleto)
    {
        $this->authorize('admin.boleto.edit', $boleto);


        return view('admin.boleto.edit', [
            'boleto' => $boleto,
            'clientes' => AdminUser::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateBoleto $request
     * @param Boleto $boleto
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateBoleto $request, Boleto $boleto)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();
        $sanitized['id_cliente'] = $request->getClienteId();

        // Update changed values Boleto
        $boleto->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/boletos'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/boletos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyBoleto $request
     * @param Boleto $boleto
     * @return ResponseFactory|RedirectResponse|Response
     * @throws Exception
     */
    public function destroy(DestroyBoleto $request, Boleto $boleto)
    {
        $boleto->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyBoleto $request
     * @return Response|bool
     * @throws Exception
     */
    public function bulkDestroy(BulkDestroyBoleto $request): Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    DB::table('boletos')->whereIn('id', $bulkChunk)
                        ->update([
                            'deleted_at' => Carbon::now()->format('Y-m-d H:i:s')
                        ]);

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
