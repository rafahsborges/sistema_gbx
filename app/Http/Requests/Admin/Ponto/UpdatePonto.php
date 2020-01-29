<?php

namespace App\Http\Requests\Admin\Ponto;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdatePonto extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.ponto.edit', $this->ponto);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'nome' => ['sometimes', 'string'],
            'logradouro' => ['nullable', 'string'],
            'numero' => ['nullable', 'string'],
            'complemento' => ['nullable', 'string'],
            'bairro' => ['nullable', 'string'],
            'cidade' => ['nullable', 'string'],
            'uf' => ['nullable', 'string'],
            'cep' => ['nullable', 'string'],
            'estacao' => ['nullable', 'string'],
            'entidade' => ['nullable', 'string'],
            'latitude' => ['nullable', 'string'],
            'longitude' => ['nullable', 'string'],
            'altura' => ['nullable', 'string'],
            'id_cliente' => ['sometimes', 'string'],
            
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
