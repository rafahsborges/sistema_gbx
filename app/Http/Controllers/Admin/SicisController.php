<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Sici\BulkDestroySici;
use App\Http\Requests\Admin\Sici\DestroySici;
use App\Http\Requests\Admin\Sici\IndexSici;
use App\Http\Requests\Admin\Sici\StoreSici;
use App\Http\Requests\Admin\Sici\UpdateSici;
use App\Models\AdminUser;
use App\Models\Cidade;
use App\Models\Estado;
use App\Models\Servico;
use App\Models\Sici;
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
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Spatie\ArrayToXml\ArrayToXml;

class SicisController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexSici $request
     * @return array|Factory|View
     */
    public function index(IndexSici $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Sici::class)->processRequestAndGet(
        // pass the request with params
            $request,

            // set columns to query
            ['id', 'ano', 'mes', 'id_cliente', 'id_servico', 'fistel', 'id_cidade', 'id_estado', 'iem1a', 'iem1b', 'iem1c', 'iem1d', 'iem1e', 'iem1f', 'iem1g', 'iem2a', 'iem2b', 'iem2c', 'iem3a', 'iem4a', 'iem5a', 'iem6a', 'iem7a', 'iem8a', 'iem8b', 'iem8c', 'iem8d', 'iem8e', 'iem9Fa', 'iem9Fb', 'iem9Fc', 'iem9Fd', 'iem9Fe', 'iem9Ja', 'iem9Jb', 'iem9Jc', 'iem9Jd', 'iem9Je', 'iem10Fa', 'iem10Fb', 'iem10Fc', 'iem10Fd', 'iem10Ja', 'iem10Jb', 'iem10Jc', 'iem10Jd', 'iau1', 'ipl1a', 'ipl1b', 'ipl1c', 'ipl1d', 'ipl2a', 'ipl2b', 'ipl2c', 'ipl2d', 'ipl3Fa', 'ipl3Ja', 'ipl6im', 'qaipl4smAqaipl5sm', 'qaipl4smAtotal', 'qaipl4smA15', 'qaipl4smA16', 'qaipl4smA17', 'qaipl4smA18', 'qaipl4smA19', 'qaipl4smBqaipl5sm', 'qaipl4smBtotal', 'qaipl4smB15', 'qaipl4smB16', 'qaipl4smB17', 'qaipl4smB18', 'qaipl4smB19', 'qaipl4smCqaipl5sm', 'qaipl4smCtotal', 'qaipl4smC15', 'qaipl4smC16', 'qaipl4smC17', 'qaipl4smC18', 'qaipl4smC19', 'qaipl4smDqaipl5sm', 'qaipl4smDtotal', 'qaipl4smD15', 'qaipl4smD16', 'qaipl4smD17', 'qaipl4smD18', 'qaipl4smD19', 'qaipl4smEqaipl5sm', 'qaipl4smEtotal', 'qaipl4smE15', 'qaipl4smE16', 'qaipl4smE17', 'qaipl4smE18', 'qaipl4smE19', 'qaipl4smFqaipl5sm', 'qaipl4smFtotal', 'qaipl4smF15', 'qaipl4smF16', 'qaipl4smF17', 'qaipl4smF18', 'qaipl4smF19', 'qaipl4smGqaipl5sm', 'qaipl4smGtotal', 'qaipl4smG15', 'qaipl4smG16', 'qaipl4smG17', 'qaipl4smG18', 'qaipl4smG19', 'qaipl4smHqaipl5sm', 'qaipl4smHtotal', 'qaipl4smH15', 'qaipl4smH16', 'qaipl4smH17', 'qaipl4smH18', 'qaipl4smH19', 'qaipl4smIqaipl5sm', 'qaipl4smItotal', 'qaipl4smI15', 'qaipl4smI16', 'qaipl4smI17', 'qaipl4smI18', 'qaipl4smI19', 'qaipl4smJqaipl5sm', 'qaipl4smJtotal', 'qaipl4smJ15', 'qaipl4smJ16', 'qaipl4smJ17', 'qaipl4smJ18', 'qaipl4smJ19', 'qaipl4smKqaipl5sm', 'qaipl4smKtotal', 'qaipl4smK15', 'qaipl4smK16', 'qaipl4smK17', 'qaipl4smK18', 'qaipl4smK19', 'qaipl4smLqaipl5sm', 'qaipl4smLtotal', 'qaipl4smL15', 'qaipl4smL16', 'qaipl4smL17', 'qaipl4smL18', 'qaipl4smL19', 'qaipl4smMqaipl5sm', 'qaipl4smMtotal', 'qaipl4smM15', 'qaipl4smM16', 'qaipl4smM17', 'qaipl4smM18', 'qaipl4smM19', 'qaipl4smNqaipl5sm', 'qaipl4smNtotal', 'qaipl4smN15', 'qaipl4smN16', 'qaipl4smN17', 'qaipl4smN18', 'qaipl4smN19', 'qaipl4smOqaipl5sm', 'qaipl4smOtotal', 'qaipl4smO15', 'qaipl4smO16', 'qaipl4smO17', 'qaipl4smO18', 'qaipl4smO19', 'status'],

            // set columns to searchIn
            ['id', 'ano', 'mes', 'fistel'],

            function ($query) use ($request) {
                $query->with(['cliente']);
                $query->with(['servico']);
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

        return view('admin.sici.index', [
            'data' => $data,
            'clientes' => (auth()->user()->is_admin !== 1) ? AdminUser::where('id', auth()->user()->id)->get() : AdminUser::all(),
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
        $this->authorize('admin.sici.create');

        if (auth()->user()->is_admin !== 1) {
            $clientes = AdminUser::where('id', auth()->user()->id)->get();
            $servicos = Servico::where('id', $clientes[0]->id_servico)->get();
        } else {
            $clientes = AdminUser::all();
            $servicos = Servico::all();
        }

        return view('admin.sici.create', [
            'clientes' => $clientes,
            'servicos' => $servicos,
            'estados' => Estado::all(),
            'cidades' => Cidade::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreSici $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreSici $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();
        $sanitized['ano'] = $request->getAnoId();
        $sanitized['mes'] = $request->getMesId();
        if (auth()->user()->is_admin === 1) {
            $sanitized['id_cliente'] = $request->getClienteId();
            $sanitized['id_servico'] = $request->getServicoId();
        } else {
            $sanitized['id_cliente'] = auth()->user()->id;
            $sanitized['id_servico'] = auth()->user()->id_servico;
            $sanitized['fistel'] = auth()->user()->fistel;
        }
        $sanitized['id_estado'] = $request->getEstadoId();
        $sanitized['id_cidade'] = $request->getCidadeId();
        $sanitized['status'] = 1;

        // Store the Sici
        $sici = Sici::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/sicis'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/sicis');
    }

    /**
     * Display the specified resource.
     *
     * @param Sici $sici
     * @return void
     * @throws AuthorizationException
     */
    public function show(Sici $sici)
    {
        $this->authorize('admin.sici.show', $sici);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Sici $sici
     * @return Factory|View
     * @throws AuthorizationException
     */
    public function edit(Sici $sici)
    {
        $this->authorize('admin.sici.edit', $sici);

        if (auth()->user()->is_admin !== 1) {
            $clientes = AdminUser::where('id', auth()->user()->id)->get();
            $servicos = Servico::where('id', $clientes[0]->id_servico)->get();
        } else {
            $clientes = AdminUser::all();
            $servicos = Servico::all();
        }

        $sici = Sici::with('cidade')
            ->with('estado')
            ->with('cliente')
            ->with('servico')
            ->find($sici->id);

        $sici['ano'] = array('nome' => $sici->ano, 'id' => $sici->ano);
        $sici['mes'] = array('nome' => $sici->mes, 'id' => $sici->mes);

        return view('admin.sici.edit', [
            'sici' => $sici,
            'clientes' => $clientes,
            'servicos' => $servicos,
            'estados' => Estado::all(),
            'cidades' => Cidade::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateSici $request
     * @param Sici $sici
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateSici $request, Sici $sici)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();
        $sanitized['ano'] = $request->getAnoId();
        $sanitized['mes'] = $request->getMesId();
        if (auth()->user()->is_admin === 1) {
            $sanitized['id_cliente'] = $request->getClienteId();
            $sanitized['id_servico'] = $request->getServicoId();
        } else {
            $sanitized['id_cliente'] = auth()->user()->id;
            $sanitized['id_servico'] = auth()->user()->id_servico;
            $sanitized['fistel'] = auth()->user()->fistel;
        }
        $sanitized['id_estado'] = $request->getEstadoId();
        $sanitized['id_cidade'] = $request->getCidadeId();
        $sanitized['status'] = 1;

        // Update changed values Sici
        $sici->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/sicis'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/sicis');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroySici $request
     * @param Sici $sici
     * @return ResponseFactory|RedirectResponse|Response
     * @throws Exception
     */
    public function destroy(DestroySici $request, Sici $sici)
    {
        $sici->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroySici $request
     * @return Response|bool
     * @throws Exception
     */
    public function bulkDestroy(BulkDestroySici $request): Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    DB::table('sicis')->whereIn('id', $bulkChunk)
                        ->update([
                            'deleted_at' => Carbon::now()->format('Y-m-d H:i:s')
                        ]);

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Sici $sici
     * @return Factory|View
     * @throws AuthorizationException
     */
    public function xml(Sici $sici)
    {
        $this->authorize('admin.sici.edit', $sici);

        $sici = Sici::with('cidade')
            ->with('estado')
            ->with('cliente')
            ->with('servico')
            ->find($sici->id);

        return view('xml.xml', compact('sici'));

        $file = Storage::put('file.xml', $contents);

        return Storage::download('file.xml');
    }
}
