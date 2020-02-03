<?php

namespace App\Http\Requests\Admin\AdminUser;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UpdateAdminUser extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Gate::allows('admin.admin-user.edit', $this->adminUser);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        $rules = [
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
            'valor' => ['nullable', 'numeric'],
            'ini_contrato' => ['nullable', 'date'],
            'fim_contrato' => ['nullable', 'date'],
            'fistel' => ['nullable', 'string'],
            'is_admin' => ['sometimes', 'boolean'],
            'forbidden' => ['sometimes', 'boolean'],
            'language' => ['sometimes', 'string'],
            'enabled' => ['sometimes', 'boolean'],
            'password' => ['sometimes', 'confirmed', 'min:7', 'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9]).*$/', 'string'],
            'roles' => ['sometimes', 'array'],
            'estado' => ['nullable'],
            'cidade' => ['nullable'],
        ];

        if (Config::get('admin-auth.activation_enabled')) {
            $rules['activated'] = ['required', 'boolean'];
        }

        return $rules;
    }

    /**
     * Modify input data
     *
     * @return array
     */
    public function getModifiedData(): array
    {
        $data = $this->only(collect($this->rules())->keys()->all());
        if (!Config::get('admin-auth.activation_enabled')) {
            $data['activated'] = true;
        }
        if (array_key_exists('password', $data) && empty($data['password'])) {
            unset($data['password']);
        }
        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }
        return $data;
    }

    public function getEstadoId()
    {
        if ($this->has('estado')) {
            return $this->get('estado')['id'];
        }
        return null;
    }

    public function getCidadeId()
    {
        if ($this->has('cidade')) {
            return $this->get('cidade')['id'];
        }
        return null;
    }
}
