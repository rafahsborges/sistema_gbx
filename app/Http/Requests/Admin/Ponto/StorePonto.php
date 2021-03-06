<?php

namespace App\Http\Requests\Admin\Ponto;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StorePonto extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.ponto.create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'nome' => ['required', 'string'],
            'logradouro' => ['nullable', 'string'],
            'numero' => ['nullable', 'string'],
            'complemento' => ['nullable', 'string'],
            'bairro' => ['nullable', 'string'],
            'cep' => ['nullable', 'string'],
            'estacao' => ['nullable', 'string'],
            'entidade' => ['nullable', 'string'],
            'latitude' => ['nullable', 'string'],
            'longitude' => ['nullable', 'string'],
            'altura' => ['nullable', 'string'],
            'cliente' => ['required'],
            'estado' => ['nullable'],
            'cidade' => ['nullable'],
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

    public function getClienteId()
    {
        if ($this->has('cliente')) {
            return $this->get('cliente')['id'];
        }
        return null;
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
