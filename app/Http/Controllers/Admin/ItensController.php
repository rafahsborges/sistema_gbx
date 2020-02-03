<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Iten\BulkDestroyIten;
use App\Http\Requests\Admin\Iten\DestroyIten;
use App\Http\Requests\Admin\Iten\IndexIten;
use App\Http\Requests\Admin\Iten\StoreIten;
use App\Http\Requests\Admin\Iten\UpdateIten;
use App\Models\Iten;
use Brackets\AdminListing\Facades\AdminListing;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class ItensController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexIten $request
     * @return array|Factory|View
     */
    public function index(IndexIten $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Iten::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'nome', 'id_etapa', 'id_status'],

            // set columns to searchIn
            ['id', 'nome']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.item.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.item.create');

        return view('admin.item.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreIten $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreIten $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Iten
        $iten = Iten::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/itens'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/itens');
    }

    /**
     * Display the specified resource.
     *
     * @param Iten $iten
     * @throws AuthorizationException
     * @return void
     */
    public function show(Iten $iten)
    {
        $this->authorize('admin.item.show', $iten);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Iten $iten
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Iten $iten)
    {
        $this->authorize('admin.item.edit', $iten);


        return view('admin.item.edit', [
            'item' => $iten,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateIten $request
     * @param Iten $iten
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateIten $request, Iten $iten)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Iten
        $iten->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/itens'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/itens');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyIten $request
     * @param Iten $iten
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyIten $request, Iten $iten)
    {
        $iten->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyIten $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyIten $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Iten::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
