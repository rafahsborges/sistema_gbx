<?php

namespace App\Http\Requests\Admin\Orcamento;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateOrcamento extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.orcamento.edit', $this->orcamento);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'tipo' => ['sometimes', 'boolean'],
            'nome' => ['nullable', 'string'],
            'razao_social' => ['nullable', 'string'],
            'cpf' => ['nullable', 'string'],
            'cnpj' => ['nullable', 'string'],
            'email' => ['sometimes', 'email', 'string'],
            'email2' => ['nullable', 'string'],
            'email3' => ['nullable', 'string'],
            'telefone' => ['nullable', 'string'],
            'celular' => ['nullable', 'string'],
            'id_cidade' => ['nullable', 'string'],
            'id_estado' => ['nullable', 'string'],
            'assunto' => ['sometimes', 'string'],
            'conteudo' => ['sometimes', 'string'],
            'enviar' => ['sometimes', 'boolean'],
            'agendar' => ['sometimes', 'boolean'],
            'agendamento' => ['nullable', 'date'],
            'enviado' => ['sometimes', 'boolean'],
            'envio' => ['nullable', 'date'],
            
        ];
    }

    /**
     * Modify input data
     *
     * @return array
     */
    public function getSanitized(): array
    {
        $sanitized = $this->validated();


        //Add your code for manipulation with request data here

        return $sanitized;
    }
}
