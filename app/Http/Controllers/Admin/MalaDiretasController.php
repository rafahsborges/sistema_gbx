<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MalaDireta\BulkDestroyMalaDireta;
use App\Http\Requests\Admin\MalaDireta\DestroyMalaDireta;
use App\Http\Requests\Admin\MalaDireta\IndexMalaDireta;
use App\Http\Requests\Admin\MalaDireta\StoreMalaDireta;
use App\Http\Requests\Admin\MalaDireta\UpdateMalaDireta;
use App\Jobs\SendMailJob;
use App\Mail\NewArrivals;
use App\Models\AdminUser;
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
            ['id', 'assunto', 'conteudo', 'id_cliente'],

            function ($query) use ($request) {
                if ($request->has('agendados')) {
                    $query->whereIn('agendar', $request->get('agendados'));
                }
                if ($request->has('enviados')) {
                    $query->whereIn('enviado', $request->get('enviados'));
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

        return view('admin.mala-direta.index', [
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
        $this->authorize('admin.mala-direta.create');

        return view('admin.mala-direta.create', [
            'clientes' => AdminUser::all(),
        ]);
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

        if ($sanitized['agendar']) {
            $sanitized['agendamento'] = Carbon::create($sanitized['agendamento']);
        } else {
            $sanitized['agendamento'] = Carbon::now();
        }

        $emails = [];
        $clientes = [];

        foreach ($sanitized['cliente'] as $cliente) {
            $emails[] = $cliente['email'];
            $clientes[] = $cliente['id'];
        }

        $sanitized['id_cliente'] = json_encode($clientes);

        // Store the MalaDireta
        $malaDiretum = MalaDireta::create($sanitized);

        if ($sanitized['agendamento']->isPast()) {
            $malaDiretum->enviado = true;
            $malaDiretum->envio = Carbon::now();
            $malaDiretum->save();

            foreach ($sanitized['cliente'] as $cliente) {
                dispatch(new SendMailJob($cliente['email'], new NewArrivals($cliente, $malaDiretum)));
            }
        }

        if ($request->ajax()) {
            return ['redirect' => url('admin/mala-diretas'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/mala-diretas');
    }

    /**
     * Display the specified resource.
     *
     * @param MalaDireta $malaDiretum
     * @return Factory|View
     * @throws AuthorizationException
     */
    public function show(MalaDireta $malaDiretum)
    {
        $this->authorize('admin.mala-direta.show', $malaDiretum);

        $malaDiretum = MalaDireta::find($malaDiretum->id);

        $malaDiretum->cliente = AdminUser::whereIn('id', json_decode($malaDiretum->id_cliente))
            ->get();

        return view('admin.mala-direta.show', [
            'malaDiretum' => $malaDiretum,
            'clientes' => AdminUser::all(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param MalaDireta $malaDiretum
     * @return Factory|View
     * @throws AuthorizationException
     */
    public function edit(MalaDireta $malaDiretum)
    {
        $this->authorize('admin.mala-direta.edit', $malaDiretum);

        $malaDiretum = MalaDireta::find($malaDiretum->id);

        $malaDiretum->cliente = AdminUser::whereIn('id', json_decode($malaDiretum->id_cliente))
            ->get();

        return view('admin.mala-direta.edit', [
            'malaDiretum' => $malaDiretum,
            'clientes' => AdminUser::all(),
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

        if ($sanitized['agendar']) {
            $sanitized['agendamento'] = Carbon::create($sanitized['agendamento']);
        } else {
            $sanitized['agendamento'] = Carbon::now();
        }

        if (!$sanitized['enviado']) {
            $sanitized['envio'] = null;
        }

        $emails = [];
        $clientes = [];

        foreach ($sanitized['cliente'] as $cliente) {
            $emails[] = $cliente['email'];
            $clientes[] = $cliente['id'];
        }

        $sanitized['id_cliente'] = json_encode($clientes);

        // Update changed values MalaDireta
        $malaDiretum->update($sanitized);

        if ($sanitized['agendamento']->isPast()) {
            $malaDiretum->enviado = true;
            $malaDiretum->envio = Carbon::now();
            $malaDiretum->save();

            foreach ($sanitized['cliente'] as $cliente) {
                dispatch(new SendMailJob($cliente['email'], new NewArrivals($cliente, $malaDiretum)));
            }
        }

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
     * @return ResponseFactory|RedirectResponse|Response
     * @throws Exception
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
     * @return Response|bool
     * @throws Exception
     */
    public function bulkDestroy(BulkDestroyMalaDireta $request): Response
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
