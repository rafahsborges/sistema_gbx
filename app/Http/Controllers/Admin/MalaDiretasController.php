<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MalaDireta\BulkDestroyMalaDireta;
use App\Http\Requests\Admin\MalaDireta\DestroyMalaDireta;
use App\Http\Requests\Admin\MalaDireta\IndexMalaDireta;
use App\Http\Requests\Admin\MalaDireta\StoreMalaDireta;
use App\Http\Requests\Admin\MalaDireta\UpdateMalaDireta;
use App\Models\MalaDireta;
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

class MalaDiretasController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexMalaDireta $request
     * @return array|Factory|View
     */
    public function index(IndexMalaDireta $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(MalaDireta::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'assunto', 'id_cliente', 'agendar', 'agendamento', 'enviado', 'envio'],

            // set columns to searchIn
            ['id', 'assunto', 'conteudo', 'id_cliente']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.mala-direta.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.mala-direta.create');

        return view('admin.mala-direta.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreMalaDireta $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreMalaDireta $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the MalaDireta
        $malaDiretum = MalaDireta::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/mala-diretas'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/mala-diretas');
    }

    /**
     * Display the specified resource.
     *
     * @param MalaDireta $malaDiretum
     * @throws AuthorizationException
     * @return void
     */
    public function show(MalaDireta $malaDiretum)
    {
        $this->authorize('admin.mala-direta.show', $malaDiretum);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param MalaDireta $malaDiretum
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(MalaDireta $malaDiretum)
    {
        $this->authorize('admin.mala-direta.edit', $malaDiretum);


        return view('admin.mala-direta.edit', [
            'malaDiretum' => $malaDiretum,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateMalaDireta $request
     * @param MalaDireta $malaDiretum
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateMalaDireta $request, MalaDireta $malaDiretum)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values MalaDireta
        $malaDiretum->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/mala-diretas'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/mala-diretas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyMalaDireta $request
     * @param MalaDireta $malaDiretum
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyMalaDireta $request, MalaDireta $malaDiretum)
    {
        $malaDiretum->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyMalaDireta $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyMalaDireta $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    DB::table('malaDireta')->whereIn('id', $bulkChunk)
                        ->update([
                            'deleted_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ]);

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
