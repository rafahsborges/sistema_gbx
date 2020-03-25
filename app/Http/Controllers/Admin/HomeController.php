<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Boleto;
use App\Models\Servico;
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
    public function index()
    {
        $boletos = Boleto::where('status', 2)->get();

        $servicos = Servico::where('id_status', 1)->get();

        return view('admin.home.index', [
            'boletos' => $boletos,
            'servicos' => $servicos,
        ]);
    }
}
