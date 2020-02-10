<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminUser\DestroyAdminUser;
use App\Http\Requests\Admin\AdminUser\IndexAdminUser;
use App\Http\Requests\Admin\AdminUser\StoreAdminUser;
use App\Http\Requests\Admin\AdminUser\UpdateAdminUser;
use App\Models\Apontamento;
use App\Models\Cidade;
use App\Models\Estado;
use App\Models\AdminUser;
use App\Models\Ponto;
use App\Models\Representante;
use App\Models\Servico;
use Carbon\Carbon;
use Spatie\Permission\Models\Role;
use Brackets\AdminAuth\Activation\Facades\Activation;
use Brackets\AdminAuth\Services\ActivationService;
use Brackets\AdminListing\Facades\AdminListing;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Config;
use Illuminate\View\View;

class AdminUsersController extends Controller
{

    /**
     * Guard used for admin user
     *
     * @var string
     */
    protected $guard = 'admin';

    /**
     * AdminUsersController constructor.
     *
     * @return void
     */
    public function __construct()
    {
        $this->guard = config('admin-auth.defaults.guard');
    }

    /**
     * Display a listing of the resource.
     *
     * @param IndexAdminUser $request
     * @return Factory|View
     */
    public function index(IndexAdminUser $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(AdminUser::class)->processRequestAndGet(
        // pass the request with params
            $request,

            // set columns to query
            ['id', 'tipo', 'nome', 'razao_social', 'cpf', 'cnpj', 'email', 'email2', 'email3', 'telefone', 'celular', 'logradouro', 'numero', 'complemento', 'bairro', 'id_cidade', 'id_estado', 'cep', 'vencimento', 'valor', 'ini_contrato', 'fim_contrato', 'fistel', 'is_admin', 'activated', 'forbidden', 'language', 'enabled', 'id_servico', 'desconto'],

            // set columns to searchIn
            ['id', 'nome', 'razao_social', 'cpf', 'cnpj', 'email', 'email2', 'email3', 'telefone', 'celular', 'logradouro', 'numero', 'complemento', 'bairro', 'id_cidade', 'id_estado', 'cep', 'fistel', 'language', 'id_servico', 'desconto']
        );

        if ($request->ajax()) {
            return ['data' => $data, 'activation' => Config::get('admin-auth.activation_enabled')];
        }

        return view('admin.admin-user.index', [
            'data' => $data,
            'activation' => Config::get('admin-auth.activation_enabled'),
            'servicos' => Servico::all(),
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
        $this->authorize('admin.admin-user.create');

        return view('admin.admin-user.create', [
            'activation' => Config::get('admin-auth.activation_enabled'),
            'roles' => Role::where('guard_name', $this->guard)->get(),
            'estados' => Estado::all(),
            'cidades' => Cidade::all(),
            'servicos' => Servico::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreAdminUser $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreAdminUser $request)
    {
        // Sanitize input
        $sanitized = $request->getModifiedData();
        $sanitized['id_estado'] = $request->getEstadoId();
        $sanitized['id_cidade'] = $request->getCidadeId();
        $sanitized['valor'] = $request->prepareCurrencies($sanitized['valor']);
        $sanitized['id_servico'] = $request->getServicoId();
        $sanitized['desconto'] = $request->prepareCurrencies($sanitized['desconto']);

        $representantes = [];
        $apontamentos = [];
        $pontos = [];

        $apontamentosList = isset($sanitized['apontamentos']) ? $sanitized['apontamentos'] : null;
        $pontosList = isset($sanitized['pontos']) ? $sanitized['pontos'] : null;
        $representantesList = isset($sanitized['representantes']) ? $sanitized['representantes'] : null;

        // Store the AdminUser
        $adminUser = AdminUser::create($sanitized);

        if ($apontamentosList) {
            foreach ($apontamentosList as $apontamento) {
                $apontamento['id_cliente'] = $adminUser->id;
                $apontamento['created_at'] = Carbon::now();
                $apontamento['updated_at'] = Carbon::now();
                // Store the Apontamento
                $apontamentos[] = Apontamento::create($apontamento);
            }
        }

        if ($pontosList) {
            foreach ($pontosList as $ponto) {
                $ponto['id_cliente'] = $adminUser->id;
                $ponto['id_estado'] = $ponto['estado']['id'];
                $ponto['id_cidade'] = $ponto['cidade']['id'];
                $ponto['created_at'] = Carbon::now();
                $ponto['updated_at'] = Carbon::now();
                // Store the Ponto
                $pontos[] = Ponto::create($ponto);
            }
        }

        if ($representantesList) {
            foreach ($representantesList as $representante) {
                $representante['id_cliente'] = $adminUser->id;
                $representante['created_at'] = Carbon::now();
                $representante['updated_at'] = Carbon::now();
                // Store the Representante
                $representantes[] = Representante::create($representante);
            }
        }

        // But we do have a roles, so we need to attach the roles to the adminUser
        $adminUser->roles()->sync(collect($request->input('roles', []))->map->id->toArray());

        if ($request->ajax()) {
            return ['redirect' => url('admin/admin-users'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/admin-users');
    }

    /**
     * Display the specified resource.
     *
     * @param AdminUser $adminUser
     * @return void
     * @throws AuthorizationException
     */
    public function show(AdminUser $adminUser)
    {
        $this->authorize('admin.admin-user.show', $adminUser);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param AdminUser $adminUser
     * @return Factory|View
     * @throws AuthorizationException
     */
    public function edit(AdminUser $adminUser)
    {
        $this->authorize('admin.admin-user.edit', $adminUser);

        $id = $adminUser->id;

        $adminUser = AdminUser::with('estado')
            ->with('cidade')
            ->find($id);

        $adminUser->load('roles');

        return view('admin.admin-user.edit', [
            'adminUser' => $adminUser,
            'activation' => Config::get('admin-auth.activation_enabled'),
            'roles' => Role::where('guard_name', $this->guard)->get(),
            'estados' => Estado::all(),
            'cidades' => Cidade::all(),
            'servicos' => Servico::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateAdminUser $request
     * @param AdminUser $adminUser
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateAdminUser $request, AdminUser $adminUser)
    {
        // Sanitize input
        $sanitized = $request->getModifiedData();
        $sanitized['id_estado'] = $request->getEstadoId();
        $sanitized['id_cidade'] = $request->getCidadeId();
        $sanitized['valor'] = $request->prepareCurrencies($sanitized['valor']);
        $sanitized['id_servico'] = $request->getServicoId();
        $sanitized['desconto'] = $request->prepareCurrencies($sanitized['desconto']);

        $representantes = [];
        $apontamentos = [];
        $pontos = [];

        $apontamentosList = isset($sanitized['apontamentos']) ? $sanitized['apontamentos'] : null;
        $pontosList = isset($sanitized['pontos']) ? $sanitized['pontos'] : null;
        $representantesList = isset($sanitized['representantes']) ? $sanitized['representantes'] : null;

        // Update changed values AdminUser
        $adminUser->update($sanitized);

        if ($apontamentosList) {
            foreach ($apontamentosList as $apontamento) {
                $apontamento['id_cliente'] = $adminUser->id;
                $apontamento['created_at'] = Carbon::now();
                $apontamento['updated_at'] = Carbon::now();
                // Update changed values Apontamento
                $apontamentos[] = Apontamento::create($apontamento);
            }
        }

        if ($pontosList) {
            foreach ($pontosList as $ponto) {
                $ponto['id_cliente'] = $adminUser->id;
                $ponto['id_estado'] = $ponto['estado']['id'];
                $ponto['id_cidade'] = $ponto['cidade']['id'];
                $ponto['created_at'] = Carbon::now();
                $ponto['updated_at'] = Carbon::now();
                // Update changed values Ponto
                $pontos[] = Ponto::create($ponto);
            }
        }

        if ($representantesList) {
            foreach ($representantesList as $representante) {
                $representante['id_cliente'] = $adminUser->id;
                $representante['created_at'] = Carbon::now();
                $representante['updated_at'] = Carbon::now();
                // Update changed values Representante
                $representantes[] = Representante::create($representante);
            }
        }

        // But we do have a roles, so we need to attach the roles to the adminUser
        if ($request->input('roles')) {
            $adminUser->roles()->sync(collect($request->input('roles', []))->map->id->toArray());
        }

        if ($request->ajax()) {
            return ['redirect' => url('admin/admin-users'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/admin-users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyAdminUser $request
     * @param AdminUser $adminUser
     * @return ResponseFactory|RedirectResponse|Response
     * @throws Exception
     */
    public function destroy(DestroyAdminUser $request, AdminUser $adminUser)
    {
        $adminUser->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Resend activation e-mail
     *
     * @param Request $request
     * @param ActivationService $activationService
     * @param AdminUser $adminUser
     * @return array|RedirectResponse
     */
    public function resendActivationEmail(Request $request, ActivationService $activationService, AdminUser $adminUser)
    {
        if (Config::get('admin-auth.activation_enabled')) {
            $response = $activationService->handle($adminUser);
            if ($response == Activation::ACTIVATION_LINK_SENT) {
                if ($request->ajax()) {
                    return ['message' => trans('brackets/admin-ui::admin.operation.succeeded')];
                }

                return redirect()->back();
            } else {
                if ($request->ajax()) {
                    abort(409, trans('brackets/admin-ui::admin.operation.failed'));
                }

                return redirect()->back();
            }
        } else {
            if ($request->ajax()) {
                abort(400, trans('brackets/admin-ui::admin.operation.not_allowed'));
            }

            return redirect()->back();
        }
    }
}
