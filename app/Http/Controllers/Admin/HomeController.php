<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Home\IndexHome;
use App\Models\Boleto;
use App\Models\Servico;
use Brackets\AdminListing\Facades\AdminListing;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\Factory;
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
}
