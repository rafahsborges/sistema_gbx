<?php

namespace App\Http\Requests\Admin\Notification;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateNotification extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        //return Gate::allows('admin.notification.edit', $this->notification);
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
            'assunto' => ['sometimes', 'string'],
            'conteudo' => ['sometimes', 'string'],
            'cliente' => ['required'],
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

    public function getClienteId(){
        if ($this->has('cliente')){
            return $this->get('cliente')['id'];
        }
        return null;
    }
}
