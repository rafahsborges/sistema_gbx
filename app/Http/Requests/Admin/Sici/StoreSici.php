<?php

namespace App\Http\Requests\Admin\Sici;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreSici extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.sici.create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'ano' => ['required', 'string'],
            'mes' => ['required', 'string'],
            'cliente' => ['required'],
            'servico' => ['required'],
            'fistel' => ['required', 'string'],
            'cidade' => ['required'],
            'estado' => ['required'],
            'iem1a' => ['nullable', 'numeric'],
            'iem1b' => ['nullable', 'numeric'],
            'iem1c' => ['nullable', 'numeric'],
            'iem1d' => ['nullable', 'numeric'],
            'iem1e' => ['nullable', 'numeric'],
            'iem1f' => ['nullable', 'numeric'],
            'iem1g' => ['nullable', 'numeric'],
            'iem2a' => ['nullable', 'numeric'],
            'iem2b' => ['nullable', 'numeric'],
            'iem2c' => ['nullable', 'numeric'],
            'iem3a' => ['nullable', 'numeric'],
            'iem4a' => ['nullable', 'integer'],
            'iem5a' => ['nullable', 'integer'],
            'iem6a' => ['nullable', 'numeric'],
            'iem7a' => ['nullable', 'numeric'],
            'iem8a' => ['nullable', 'numeric'],
            'iem8b' => ['nullable', 'numeric'],
            'iem8c' => ['nullable', 'numeric'],
            'iem8d' => ['nullable', 'numeric'],
            'iem8e' => ['nullable', 'numeric'],
            'iem9Fa' => ['nullable', 'numeric'],
            'iem9Fb' => ['nullable', 'numeric'],
            'iem9Fc' => ['nullable', 'numeric'],
            'iem9Fd' => ['nullable', 'numeric'],
            'iem9Fe' => ['nullable', 'numeric'],
            'iem9Ja' => ['nullable', 'numeric'],
            'iem9Jb' => ['nullable', 'numeric'],
            'iem9Jc' => ['nullable', 'numeric'],
            'iem9Jd' => ['nullable', 'numeric'],
            'iem9Je' => ['nullable', 'numeric'],
            'iem10Fa' => ['nullable', 'numeric'],
            'iem10Fb' => ['nullable', 'numeric'],
            'iem10Fc' => ['nullable', 'numeric'],
            'iem10Fd' => ['nullable', 'numeric'],
            'iem10Ja' => ['nullable', 'numeric'],
            'iem10Jb' => ['nullable', 'numeric'],
            'iem10Jc' => ['nullable', 'numeric'],
            'iem10Jd' => ['nullable', 'numeric'],
            'iau1' => ['nullable', 'integer'],
            'ipl1a' => ['nullable', 'numeric'],
            'ipl1b' => ['nullable', 'numeric'],
            'ipl1c' => ['nullable', 'numeric'],
            'ipl1d' => ['nullable', 'numeric'],
            'ipl2a' => ['nullable', 'numeric'],
            'ipl2b' => ['nullable', 'numeric'],
            'ipl2c' => ['nullable', 'numeric'],
            'ipl2d' => ['nullable', 'numeric'],
            'ipl3Fa' => ['nullable', 'integer'],
            'ipl3Ja' => ['nullable', 'integer'],
            'ipl6im' => ['nullable', 'integer'],
            'qaipl4smAqaipl5sm' => ['nullable', 'integer'],
            'qaipl4smAtotal' => ['nullable', 'integer'],
            'qaipl4smA15' => ['nullable', 'integer'],
            'qaipl4smA16' => ['nullable', 'integer'],
            'qaipl4smA17' => ['nullable', 'integer'],
            'qaipl4smA18' => ['nullable', 'integer'],
            'qaipl4smA19' => ['nullable', 'integer'],
            'qaipl4smBqaipl5sm' => ['nullable', 'integer'],
            'qaipl4smBtotal' => ['nullable', 'integer'],
            'qaipl4smB15' => ['nullable', 'integer'],
            'qaipl4smB16' => ['nullable', 'integer'],
            'qaipl4smB17' => ['nullable', 'integer'],
            'qaipl4smB18' => ['nullable', 'integer'],
            'qaipl4smB19' => ['nullable', 'integer'],
            'qaipl4smCqaipl5sm' => ['nullable', 'integer'],
            'qaipl4smCtotal' => ['nullable', 'integer'],
            'qaipl4smC15' => ['nullable', 'integer'],
            'qaipl4smC16' => ['nullable', 'integer'],
            'qaipl4smC17' => ['nullable', 'integer'],
            'qaipl4smC18' => ['nullable', 'integer'],
            'qaipl4smC19' => ['nullable', 'integer'],
            'qaipl4smDqaipl5sm' => ['nullable', 'integer'],
            'qaipl4smDtotal' => ['nullable', 'integer'],
            'qaipl4smD15' => ['nullable', 'integer'],
            'qaipl4smD16' => ['nullable', 'integer'],
            'qaipl4smD17' => ['nullable', 'integer'],
            'qaipl4smD18' => ['nullable', 'integer'],
            'qaipl4smD19' => ['nullable', 'integer'],
            'qaipl4smEqaipl5sm' => ['nullable', 'integer'],
            'qaipl4smEtotal' => ['nullable', 'integer'],
            'qaipl4smE15' => ['nullable', 'integer'],
            'qaipl4smE16' => ['nullable', 'integer'],
            'qaipl4smE17' => ['nullable', 'integer'],
            'qaipl4smE18' => ['nullable', 'integer'],
            'qaipl4smE19' => ['nullable', 'integer'],
            'qaipl4smFqaipl5sm' => ['nullable', 'integer'],
            'qaipl4smFtotal' => ['nullable', 'integer'],
            'qaipl4smF15' => ['nullable', 'integer'],
            'qaipl4smF16' => ['nullable', 'integer'],
            'qaipl4smF17' => ['nullable', 'integer'],
            'qaipl4smF18' => ['nullable', 'integer'],
            'qaipl4smF19' => ['nullable', 'integer'],
            'qaipl4smGqaipl5sm' => ['nullable', 'integer'],
            'qaipl4smGtotal' => ['nullable', 'integer'],
            'qaipl4smG15' => ['nullable', 'integer'],
            'qaipl4smG16' => ['nullable', 'integer'],
            'qaipl4smG17' => ['nullable', 'integer'],
            'qaipl4smG18' => ['nullable', 'integer'],
            'qaipl4smG19' => ['nullable', 'integer'],
            'qaipl4smHqaipl5sm' => ['nullable', 'integer'],
            'qaipl4smHtotal' => ['nullable', 'integer'],
            'qaipl4smH15' => ['nullable', 'integer'],
            'qaipl4smH16' => ['nullable', 'integer'],
            'qaipl4smH17' => ['nullable', 'integer'],
            'qaipl4smH18' => ['nullable', 'integer'],
            'qaipl4smH19' => ['nullable', 'integer'],
            'qaipl4smIqaipl5sm' => ['nullable', 'integer'],
            'qaipl4smItotal' => ['nullable', 'integer'],
            'qaipl4smI15' => ['nullable', 'integer'],
            'qaipl4smI16' => ['nullable', 'integer'],
            'qaipl4smI17' => ['nullable', 'integer'],
            'qaipl4smI18' => ['nullable', 'integer'],
            'qaipl4smI19' => ['nullable', 'integer'],
            'qaipl4smJqaipl5sm' => ['nullable', 'integer'],
            'qaipl4smJtotal' => ['nullable', 'integer'],
            'qaipl4smJ15' => ['nullable', 'integer'],
            'qaipl4smJ16' => ['nullable', 'integer'],
            'qaipl4smJ17' => ['nullable', 'integer'],
            'qaipl4smJ18' => ['nullable', 'integer'],
            'qaipl4smJ19' => ['nullable', 'integer'],
            'qaipl4smKqaipl5sm' => ['nullable', 'integer'],
            'qaipl4smKtotal' => ['nullable', 'integer'],
            'qaipl4smK15' => ['nullable', 'integer'],
            'qaipl4smK16' => ['nullable', 'integer'],
            'qaipl4smK17' => ['nullable', 'integer'],
            'qaipl4smK18' => ['nullable', 'integer'],
            'qaipl4smK19' => ['nullable', 'integer'],
            'qaipl4smLqaipl5sm' => ['nullable', 'integer'],
            'qaipl4smLtotal' => ['nullable', 'integer'],
            'qaipl4smL15' => ['nullable', 'integer'],
            'qaipl4smL16' => ['nullable', 'integer'],
            'qaipl4smL17' => ['nullable', 'integer'],
            'qaipl4smL18' => ['nullable', 'integer'],
            'qaipl4smL19' => ['nullable', 'integer'],
            'qaipl4smMqaipl5sm' => ['nullable', 'integer'],
            'qaipl4smMtotal' => ['nullable', 'integer'],
            'qaipl4smM15' => ['nullable', 'integer'],
            'qaipl4smM16' => ['nullable', 'integer'],
            'qaipl4smM17' => ['nullable', 'integer'],
            'qaipl4smM18' => ['nullable', 'integer'],
            'qaipl4smM19' => ['nullable', 'integer'],
            'qaipl4smNqaipl5sm' => ['nullable', 'integer'],
            'qaipl4smNtotal' => ['nullable', 'integer'],
            'qaipl4smN15' => ['nullable', 'integer'],
            'qaipl4smN16' => ['nullable', 'integer'],
            'qaipl4smN17' => ['nullable', 'integer'],
            'qaipl4smN18' => ['nullable', 'integer'],
            'qaipl4smN19' => ['nullable', 'integer'],
            'qaipl4smOqaipl5sm' => ['nullable', 'integer'],
            'qaipl4smOtotal' => ['nullable', 'integer'],
            'qaipl4smO15' => ['nullable', 'integer'],
            'qaipl4smO16' => ['nullable', 'integer'],
            'qaipl4smO17' => ['nullable', 'integer'],
            'qaipl4smO18' => ['nullable', 'integer'],
            'qaipl4smO19' => ['nullable', 'integer'],
            'status' => ['required', 'integer'],

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

    public function getServicoId()
    {
        if ($this->has('servico')) {
            return $this->get('servico')['id'];
        }
        return null;
    }

    public function prepareCurrencies($string)
    {
        return str_replace(',', '.', str_replace('.', '', $string));
    }
}
