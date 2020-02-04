<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Item\BulkDestroyItem;
use App\Http\Requests\Admin\Item\DestroyItem;
use App\Http\Requests\Admin\Item\IndexItem;
use App\Http\Requests\Admin\Item\StoreItem;
use App\Http\Requests\Admin\Item\UpdateItem;
use App\Models\Item;
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

class ItensController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexItem $request
     * @return array|Factory|View
     */
    public function index(IndexItem $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Item::class)->processRequestAndGet(
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
     * @return Factory|View
     * @throws AuthorizationException
     */
    public function create()
    {
        $this->authorize('admin.item.create');

        return view('admin.item.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreItem $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreItem $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Item
        $item = Item::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/itens'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/itens');
    }

    /**
     * Display the specified resource.
     *
     * @param Item $item
     * @return void
     * @throws AuthorizationException
     */
    public function show(Item $item)
    {
        $this->authorize('admin.item.show', $item);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Item $item
     * @return Factory|View
     * @throws AuthorizationException
     */
    public function edit(Item $item)
    {
        $this->authorize('admin.item.edit', $item);


        return view('admin.item.edit', [
            'item' => $item,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateItem $request
     * @param Item $item
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateItem $request, Item $item)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Item
        $item->update($sanitized);

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
     * @param DestroyItem $request
     * @param Item $item
     * @return ResponseFactory|RedirectResponse|Response
     * @throws Exception
     */
    public function destroy(DestroyItem $request, Item $item)
    {
        $item->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyItem $request
     * @return Response|bool
     * @throws Exception
     */
    public function bulkDestroy(BulkDestroyItem $request): Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    DB::table('itens')->whereIn('id', $bulkChunk)
                        ->update([
                            'deleted_at' => Carbon::now()->format('Y-m-d H:i:s')
                        ]);
                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
