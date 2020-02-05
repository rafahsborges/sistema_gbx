<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminUser;
use App\Models\Cidade;
use App\Models\Estado;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public $adminUser;

    /**
     * Guard used for admin user
     *
     * @var string
     */
    protected $guard = 'admin';

    public function __construct()
    {
        // TODO add authorization
        $this->guard = config('admin-auth.defaults.guard');
    }

    /**
     * Get logged user before each method
     *
     * @param Request $request
     */
    protected function setUser($request)
    {
        if (empty($request->user($this->guard))) {
            abort(404, 'Admin User not found');
        }

        $this->adminUser = $request->user($this->guard);
    }

    /**
     * Show the form for editing logged user profile.
     *
     * @param Request $request
     * @return Factory|View
     */
    public function editProfile(Request $request)
    {
        $this->setUser($request);

        $adminUser = AdminUser::with('estado')
            ->with('cidade')
            ->find($this->adminUser->id);

        return view('admin.profile.edit-profile', [
            'adminUser' => $adminUser,
            'estados' => Estado::all(),
            'cidades' => Cidade::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @return array|RedirectResponse|Redirector
     * @throws ValidationException
     */
    public function updateProfile(Request $request)
    {
        $this->setUser($request);
        $adminUser = AdminUser::find($this->adminUser->id);

        // Validate the request
        $this->validate($request, [
            'tipo' => ['sometimes', 'boolean'],
            'nome' => ['nullable', 'string'],
            'razao_social' => ['nullable', 'string'],
            'cpf' => ['nullable', Rule::unique('admin_users', 'cpf')->ignore($this->adminUser->getKey(), $this->adminUser->getKeyName()), 'string'],
            'cnpj' => ['nullable', Rule::unique('admin_users', 'cnpj')->ignore($this->adminUser->getKey(), $this->adminUser->getKeyName()), 'string'],
            'email' => ['sometimes', 'email', Rule::unique('admin_users', 'email')->ignore($this->adminUser->getKey(), $this->adminUser->getKeyName()), 'string'],
            'email2' => ['nullable', 'string'],
            'email3' => ['nullable', 'string'],
            'telefone' => ['nullable', 'string'],
            'celular' => ['nullable', 'string'],
            'logradouro' => ['nullable', 'string'],
            'numero' => ['nullable', 'string'],
            'complemento' => ['nullable', 'string'],
            'bairro' => ['nullable', 'string'],
            'cep' => ['nullable', 'string'],
            'vencimento' => ['nullable', 'date'],
            'valor' => ['nullable'],
            'ini_contrato' => ['nullable', 'date'],
            'fim_contrato' => ['nullable', 'date'],
            'fistel' => ['nullable', 'string'],
            'is_admin' => ['sometimes', 'boolean'],
            'language' => ['sometimes', 'string'],
            'enabled' => ['sometimes', 'boolean'],
            'estado' => ['nullable'],
            'cidade' => ['nullable'],
        ]);

        // Sanitize input
        $sanitized = $request->only([
            'tipo',
            'nome',
            'razao_social',
            'cpf',
            'cnpj',
            'email',
            'email2',
            'email3',
            'telefone',
            'celular',
            'logradouro',
            'numero',
            'complemento',
            'bairro',
            'cep',
            'vencimento',
            'valor',
            'ini_contrato',
            'fim_contrato',
            'fistel',
            'language',
            'estado',
            'cidade',
        ]);

        $sanitized['id_estado'] = $sanitized['estado']['id'];
        $sanitized['id_cidade'] = $sanitized['cidade']['id'];
        $sanitized['valor'] = str_replace(',', '.', str_replace('.', '', $sanitized['valor']));

        unset($sanitized['estado']);
        unset($sanitized['cidade']);

        // Update changed values AdminUser
        $adminUser->update($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/profile'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/profile');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Request $request
     * @return Factory|View
     */
    public function editPassword(Request $request)
    {
        $this->setUser($request);

        return view('admin.profile.edit-password', [
            'adminUser' => $this->adminUser,
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @return array|RedirectResponse|Redirector
     * @throws ValidationException
     */
    public function updatePassword(Request $request)
    {
        $this->setUser($request);
        $adminUser = $this->adminUser;

        // Validate the request
        $this->validate($request, [
            'password' => ['sometimes', 'confirmed', 'min:7', 'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9]).*$/', 'string'],
        ]);

        // Sanitize input
        $sanitized = $request->only([
            'password',
        ]);

        //Modify input, set hashed password
        $sanitized['password'] = Hash::make($sanitized['password']);

        // Update changed values AdminUser
        $this->adminUser->update($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/password'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/password');
    }
}
