<?php

namespace App\Http\Requests\Admin\AdminUser;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class StoreAdminUser extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Gate::allows('admin.admin-user.create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        $rules = [
            'nome' => ['nullable', 'string'],
            'razao_social' => ['nullable', 'string'],
            'cpf' => ['nullable', Rule::unique('admin_users', 'cpf'), 'string'],
            'cnpj' => ['nullable', Rule::unique('admin_users', 'cnpj'), 'string'],
            'email' => ['required', 'email', Rule::unique('admin_users', 'email'), 'string'],
            'email2' => ['nullable', 'string'],
            'email3' => ['nullable', 'string'],
            'telefone' => ['nullable', 'string'],
            'celular' => ['nullable', 'string'],
            'logradouro' => ['nullable', 'string'],
            'numero' => ['nullable', 'string'],
            'complemento' => ['nullable', 'string'],
            'bairro' => ['nullable', 'string'],
            'cidade' => ['nullable', 'string'],
            'uf' => ['nullable', 'string'],
            'cep' => ['nullable', 'string'],
            'vencimento' => ['nullable', 'date'],
            'valor' => ['nullable', 'numeric'],
            'ini_contrato' => ['nullable', 'date'],
            'fim_contrato' => ['nullable', 'date'],
            'fistel' => ['nullable', 'string'],
            'is_admin' => ['required', 'boolean'],
            'forbidden' => ['required', 'boolean'],
            'language' => ['required', 'string'],
            'enabled' => ['required', 'boolean'],
            'password' => ['required', 'confirmed', 'min:7', 'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9]).*$/', 'string'],
                
            'roles' => ['array'],
                
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
        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }
        return $data;
    }
}
