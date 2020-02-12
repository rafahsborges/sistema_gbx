<?php

namespace App\Http\Requests\Admin\Informativo;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateInformativo extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.informativo.edit', $this->informativo);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'assunto' => ['sometimes', 'string'],
            'conteudo' => ['sometimes', 'string'],
            'servico' => ['sometimes'],
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

    public function getServicoId()
    {
        if ($this->has('servico')) {
            return $this->get('servico')['id'];
        }
        return null;
    }
}
