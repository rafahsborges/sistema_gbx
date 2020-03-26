<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Home\IndexHome;
use App\Juno\Juno;
use App\Models\Boleto;
use App\Models\Servico;
use Brackets\AdminListing\Facades\AdminListing;
use Carbon\Carbon;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\Factory;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class HomeController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return array|Factory|View
     */
    public function index(IndexHome $request)
    {
        // create and AdminListing instance for a specific model and
        $boletos = AdminListing::create(Boleto::class)->processRequestAndGet(
        // pass the request with params
            $request,

            // set columns to query
            ['id', 'descricao', 'valor', 'vencimento', 'valor_pago', 'pagamento', 'id_cliente', 'status'],

            // set columns to searchIn
            ['id'],

            function ($query) use ($request) {
                $query->with(['cliente']);
                $query->with(['servico']);
                $query->where('status', 2);
                if (auth()->user()->is_admin !== 1) {
                    $query->where('id_cliente', auth()->user()->id);
                }
            }
        );

        // create and AdminListing instance for a specific model and
        $servicos = AdminListing::create(Servico::class)->processRequestAndGet(
        // pass the request with params
            $request,

            // set columns to query
            ['id', 'nome', 'valor', 'orgao', 'id_etapa', 'id_status'],

            // set columns to searchIn
            ['id', 'nome', 'orgao', 'descricao', 'observacao'],

            function ($query) use ($request) {
                $query->with(['status']);
                $query->with(['etapa']);
                $query->where('id_status', 1);
            }
        );

        return view('admin.home.index', [
            'boletos' => $boletos,
            'servicos' => $servicos,
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Boleto $boleto
     * @return RedirectResponse|Redirector
     * @throws AuthorizationException
     */
    public function boleto(Boleto $boleto)
    {
        //$this->authorize('admin.boleto.edit', $boleto);

        $boleto = Boleto::with('cliente')->find($boleto->id);

        $boletoFacil = new Juno(env('JUNO_RESOURCE_TOKEN'), true);
        $result = $boletoFacil->getCharge($boleto->juno_id);

        return redirect($result['installmentLink']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Boleto $boleto
     * @return RedirectResponse|Redirector
     * @throws AuthorizationException
     */
    public function status(Boleto $boleto)
    {
        //$this->authorize('admin.boleto.edit', $boleto);

        if ($boleto->juno_id) {

            $boletoFacil = new Juno(env('JUNO_RESOURCE_TOKEN'), true);
            $result = $boletoFacil->getCharge($boleto->juno_id);

            if (isset($result['dueDate'])) {
                $boleto->update([
                    'vencimento' => Carbon::createFromFormat('Y-m-d', $result['dueDate'])->format('Y-m-d H:i:s'),
                ]);
            }

            if (isset($result['payNumber'])) {

                if ($result['payNumber'] === 'BOLETO CANCELADO') {
                    DB::table('boletos')->where('id', $boleto->id)
                        ->update([
                            'status' => 3,
                            'deleted_at' => Carbon::now()->format('Y-m-d H:i:s'),
                        ]);
                } elseif ($result['payNumber'] === 'BOLETO PAGO') {
                    if (isset($result['payments'])) {
                        $data_pagamento = $result['payments'][0]['date'];
                        $valor_pagamento = $result['payments'][0]['amount'];
                        $status = $result['payments'][0]['status'] === 'CONFIRMED' ? 1 : 0;
                        $boleto->update([
                            'pagamento' => $data_pagamento,
                            'valor_pago' => $valor_pagamento,
                            'status' => $status,
                        ]);
                    }
                } else {
                    if (Carbon::createFromFormat('Y-m-d', $result['dueDate'])->isPast()) {
                        $boleto->update([
                            'status' => 2,
                        ]);
                    } else {
                        $boleto->update([
                            'valor' => $result['amount'],
                            'status' => 0,
                        ]);
                    }
                }
            }
        } else {
            DB::table('boletos')->where('id', $boleto->id)
                ->update([
                    'status' => 3,
                    'deleted_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ]);
        }

        return redirect('admin/');
    }
}
