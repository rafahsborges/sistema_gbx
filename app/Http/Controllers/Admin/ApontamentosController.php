<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Apontamento\BulkDestroyApontamento;
use App\Http\Requests\Admin\Apontamento\DestroyApontamento;
use App\Http\Requests\Admin\Apontamento\IndexApontamento;
use App\Http\Requests\Admin\Apontamento\StoreApontamento;
use App\Http\Requests\Admin\Apontamento\UpdateApontamento;
use App\Models\Apontamento;
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

class ApontamentosController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexApontamento $request
     * @return array|Factory|View
     */
    public function index(IndexApontamento $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Apontamento::class)->processRequestAndGet(
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

        return view('admin.apontamento.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.apontamento.create');

        return view('admin.apontamento.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreApontamento $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreApontamento $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Apontamento
        $apontamento = Apontamento::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/apontamentos'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/apontamentos');
    }

    /**
     * Display the specified resource.
     *
     * @param Apontamento $apontamento
     * @throws AuthorizationException
     * @return void
     */
    public function show(Apontamento $apontamento)
    {
        $this->authorize('admin.apontamento.show', $apontamento);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Apontamento $apontamento
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Apontamento $apontamento)
    {
        $this->authorize('admin.apontamento.edit', $apontamento);


        return view('admin.apontamento.edit', [
            'apontamento' => $apontamento,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateApontamento $request
     * @param Apontamento $apontamento
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateApontamento $request, Apontamento $apontamento)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Apontamento
        $apontamento->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/apontamentos'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/apontamentos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyApontamento $request
     * @param Apontamento $apontamento
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyApontamento $request, Apontamento $apontamento)
    {
        $apontamento->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyApontamento $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyApontamento $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    DB::table('apontamentos')->whereIn('id', $bulkChunk)
                        ->update([
                            'deleted_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ]);

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
