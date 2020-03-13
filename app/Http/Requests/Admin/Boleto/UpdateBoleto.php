<?php

namespace App\Http\Requests\Admin\Boleto;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateBoleto extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        //return Gate::allows('admin.boleto.edit', $this->boleto);
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
            'valor' => ['sometimes'],
            'vencimento' => ['sometimes', 'date'],
            'valor_pago' => ['sometimes'],
            'pagamento' => ['nullable', 'date'],
            'cliente' => ['sometimes'],
            'status' => ['sometimes'],
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

    public function getStatusId()
    {
        if ($this->has('status')) {
            return $this->get('status')['id'];
        }
        return null;
    }
}
