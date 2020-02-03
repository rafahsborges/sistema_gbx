<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Cidade\BulkDestroyCidade;
use App\Http\Requests\Admin\Cidade\DestroyCidade;
use App\Http\Requests\Admin\Cidade\IndexCidade;
use App\Http\Requests\Admin\Cidade\StoreCidade;
use App\Http\Requests\Admin\Cidade\UpdateCidade;
use App\Models\Cidade;
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

class CidadesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexCidade $request
     * @return array|Factory|View
     */
    public function index(IndexCidade $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Cidade::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'nome', 'ibge_code', 'id_estado', 'enabled'],

            // set columns to searchIn
            ['id', 'nome', 'ibge_code']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.cidade.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.cidade.create');

        return view('admin.cidade.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreCidade $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreCidade $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Cidade
        $cidade = Cidade::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/cidades'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/cidades');
    }

    /**
     * Display the specified resource.
     *
     * @param Cidade $cidade
     * @throws AuthorizationException
     * @return void
     */
    public function show(Cidade $cidade)
    {
        $this->authorize('admin.cidade.show', $cidade);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Cidade $cidade
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Cidade $cidade)
    {
        $this->authorize('admin.cidade.edit', $cidade);


        return view('admin.cidade.edit', [
            'cidade' => $cidade,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateCidade $request
     * @param Cidade $cidade
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateCidade $request, Cidade $cidade)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Cidade
        $cidade->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/cidades'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/cidades');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyCidade $request
     * @param Cidade $cidade
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyCidade $request, Cidade $cidade)
    {
        $cidade->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyCidade $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyCidade $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    DB::table('cidades')->whereIn('id', $bulkChunk)
                        ->update([
                            'deleted_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ]);

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
