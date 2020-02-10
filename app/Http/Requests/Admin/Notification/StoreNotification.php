<?php

namespace App\Http\Requests\Admin\Notification;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreNotification extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        //return Gate::allows('admin.notification.create');
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
            'assunto' => ['required', 'string'],
            'conteudo' => ['required', 'string'],
            'id_cliente' => ['required', 'string'],
            'agendar' => ['required', 'boolean'],
            'agendamento' => ['nullable', 'date'],
            'enviado' => ['required', 'boolean'],
            
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
