<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Representante\BulkDestroyRepresentante;
use App\Http\Requests\Admin\Representante\DestroyRepresentante;
use App\Http\Requests\Admin\Representante\IndexRepresentante;
use App\Http\Requests\Admin\Representante\StoreRepresentante;
use App\Http\Requests\Admin\Representante\UpdateRepresentante;
use App\Models\AdminUser;
use App\Models\Representante;
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

class RepresentantesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexRepresentante $request
     * @return array|Factory|View
     */
    public function index(IndexRepresentante $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Representante::class)->processRequestAndGet(
        // pass the request with params
            $request,

            // set columns to query
            ['id', 'nome', 'email', 'telefone', 'celular', 'cargo', 'id_cliente'],

            // set columns to searchIn
            ['id', 'nome', 'email', 'telefone', 'celular', 'cargo'],

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

        return view('admin.representante.index', [
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
        $this->authorize('admin.representante.create');

        return view('admin.representante.create', [
            'clientes' => AdminUser::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreRepresentante $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreRepresentante $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();
        $sanitized['id_cliente'] = $request->getClienteId();

        // Store the Representante
        $representante = Representante::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/representantes'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/representantes');
    }

    /**
     * Display the specified resource.
     *
     * @param Representante $representante
     * @return void
     * @throws AuthorizationException
     */
    public function show(Representante $representante)
    {
        $this->authorize('admin.representante.show', $representante);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Representante $representante
     * @return Factory|View
     * @throws AuthorizationException
     */
    public function edit(Representante $representante)
    {
        $this->authorize('admin.representante.edit', $representante);

        $representante = Representante::with('cliente')
            ->find($representante->id);

        return view('admin.representante.edit', [
            'representante' => $representante,
            'clientes' => AdminUser::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRepresentante $request
     * @param Representante $representante
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateRepresentante $request, Representante $representante)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();
        $sanitized['id_cliente'] = $request->getClienteId();

        // Update changed values Representante
        $representante->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/representantes'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/representantes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyRepresentante $request
     * @param Representante $representante
     * @return ResponseFactory|RedirectResponse|Response
     * @throws Exception
     */
    public function destroy(DestroyRepresentante $request, Representante $representante)
    {
        $representante->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyRepresentante $request
     * @return Response|bool
     * @throws Exception
     */
    public function bulkDestroy(BulkDestroyRepresentante $request): Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    DB::table('representantes')->whereIn('id', $bulkChunk)
                        ->update([
                            'deleted_at' => Carbon::now()->format('Y-m-d H:i:s')
                        ]);

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
