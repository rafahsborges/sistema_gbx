<?php

namespace App\Http\Requests\Admin\Servico;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreServico extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        //return Gate::allows('admin.servico.create');
        return auth()->check();
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
            'valor' => ['nullable'],
            'orgao' => ['nullable', 'string'],
            'descricao' => ['required', 'string'],
            'etapa' => ['nullable'],
            'status' => ['required'],
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

    public function getStatusId(){
        if ($this->has('status')){
            return $this->get('status')['id'];
        }
        return null;
    }

    public function getEtapaId(){
        if ($this->has('etapa')){
            return $this->get('etapa')['id'];
        }
        return null;
    }

    public function prepareCurrencies($string)
    {
        return str_replace(',', '.', str_replace('.', '', $string));
    }
}
