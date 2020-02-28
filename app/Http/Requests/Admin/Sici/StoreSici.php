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
            'ano' => ['required'],
            'mes' => ['required'],
            'cliente' => ['nullable'],
            'servico' => ['nullable'],
            'fistel' => ['nullable'],
            'cidade' => ['required'],
            'estado' => ['required'],
            'iem1a' => ['nullable'],
            'iem1b' => ['nullable'],
            'iem1c' => ['nullable'],
            'iem1d' => ['nullable'],
            'iem1e' => ['nullable'],
            'iem1f' => ['nullable'],
            'iem1g' => ['nullable'],
            'iem2a' => ['nullable'],
            'iem2b' => ['nullable'],
            'iem2c' => ['nullable'],
            'iem3a' => ['nullable'],
            'iem4a' => ['nullable'],
            'iem5a' => ['nullable'],
            'iem6a' => ['nullable'],
            'iem7a' => ['nullable'],
            'iem8a' => ['nullable'],
            'iem8b' => ['nullable'],
            'iem8c' => ['nullable'],
            'iem8d' => ['nullable'],
            'iem8e' => ['nullable'],
            'iem9Fa' => ['nullable'],
            'iem9Fb' => ['nullable'],
            'iem9Fc' => ['nullable'],
            'iem9Fd' => ['nullable'],
            'iem9Fe' => ['nullable'],
            'iem9Ja' => ['nullable'],
            'iem9Jb' => ['nullable'],
            'iem9Jc' => ['nullable'],
            'iem9Jd' => ['nullable'],
            'iem9Je' => ['nullable'],
            'iem10Fa' => ['nullable'],
            'iem10Fb' => ['nullable'],
            'iem10Fc' => ['nullable'],
            'iem10Fd' => ['nullable'],
            'iem10Ja' => ['nullable'],
            'iem10Jb' => ['nullable'],
            'iem10Jc' => ['nullable'],
            'iem10Jd' => ['nullable'],
            'iau1' => ['nullable'],
            'ipl1a' => ['nullable'],
            'ipl1b' => ['nullable'],
            'ipl1c' => ['nullable'],
            'ipl1d' => ['nullable'],
            'ipl2a' => ['nullable'],
            'ipl2b' => ['nullable'],
            'ipl2c' => ['nullable'],
            'ipl2d' => ['nullable'],
            'ipl3Fa' => ['nullable'],
            'ipl3Ja' => ['nullable'],
            'ipl6im' => ['nullable'],
            'qaipl4smAqaipl5sm' => ['nullable'],
            'qaipl4smAtotal' => ['nullable'],
            'qaipl4smA15' => ['nullable'],
            'qaipl4smA16' => ['nullable'],
            'qaipl4smA17' => ['nullable'],
            'qaipl4smA18' => ['nullable'],
            'qaipl4smA19' => ['nullable'],
            'qaipl4smBqaipl5sm' => ['nullable'],
            'qaipl4smBtotal' => ['nullable'],
            'qaipl4smB15' => ['nullable'],
            'qaipl4smB16' => ['nullable'],
            'qaipl4smB17' => ['nullable'],
            'qaipl4smB18' => ['nullable'],
            'qaipl4smB19' => ['nullable'],
            'qaipl4smCqaipl5sm' => ['nullable'],
            'qaipl4smCtotal' => ['nullable'],
            'qaipl4smC15' => ['nullable'],
            'qaipl4smC16' => ['nullable'],
            'qaipl4smC17' => ['nullable'],
            'qaipl4smC18' => ['nullable'],
            'qaipl4smC19' => ['nullable'],
            'qaipl4smDqaipl5sm' => ['nullable'],
            'qaipl4smDtotal' => ['nullable'],
            'qaipl4smD15' => ['nullable'],
            'qaipl4smD16' => ['nullable'],
            'qaipl4smD17' => ['nullable'],
            'qaipl4smD18' => ['nullable'],
            'qaipl4smD19' => ['nullable'],
            'qaipl4smEqaipl5sm' => ['nullable'],
            'qaipl4smEtotal' => ['nullable'],
            'qaipl4smE15' => ['nullable'],
            'qaipl4smE16' => ['nullable'],
            'qaipl4smE17' => ['nullable'],
            'qaipl4smE18' => ['nullable'],
            'qaipl4smE19' => ['nullable'],
            'qaipl4smFqaipl5sm' => ['nullable'],
            'qaipl4smFtotal' => ['nullable'],
            'qaipl4smF15' => ['nullable'],
            'qaipl4smF16' => ['nullable'],
            'qaipl4smF17' => ['nullable'],
            'qaipl4smF18' => ['nullable'],
            'qaipl4smF19' => ['nullable'],
            'qaipl4smGqaipl5sm' => ['nullable'],
            'qaipl4smGtotal' => ['nullable'],
            'qaipl4smG15' => ['nullable'],
            'qaipl4smG16' => ['nullable'],
            'qaipl4smG17' => ['nullable'],
            'qaipl4smG18' => ['nullable'],
            'qaipl4smG19' => ['nullable'],
            'qaipl4smHqaipl5sm' => ['nullable'],
            'qaipl4smHtotal' => ['nullable'],
            'qaipl4smH15' => ['nullable'],
            'qaipl4smH16' => ['nullable'],
            'qaipl4smH17' => ['nullable'],
            'qaipl4smH18' => ['nullable'],
            'qaipl4smH19' => ['nullable'],
            'qaipl4smIqaipl5sm' => ['nullable'],
            'qaipl4smItotal' => ['nullable'],
            'qaipl4smI15' => ['nullable'],
            'qaipl4smI16' => ['nullable'],
            'qaipl4smI17' => ['nullable'],
            'qaipl4smI18' => ['nullable'],
            'qaipl4smI19' => ['nullable'],
            'qaipl4smJqaipl5sm' => ['nullable'],
            'qaipl4smJtotal' => ['nullable'],
            'qaipl4smJ15' => ['nullable'],
            'qaipl4smJ16' => ['nullable'],
            'qaipl4smJ17' => ['nullable'],
            'qaipl4smJ18' => ['nullable'],
            'qaipl4smJ19' => ['nullable'],
            'qaipl4smKqaipl5sm' => ['nullable'],
            'qaipl4smKtotal' => ['nullable'],
            'qaipl4smK15' => ['nullable'],
            'qaipl4smK16' => ['nullable'],
            'qaipl4smK17' => ['nullable'],
            'qaipl4smK18' => ['nullable'],
            'qaipl4smK19' => ['nullable'],
            'qaipl4smLqaipl5sm' => ['nullable'],
            'qaipl4smLtotal' => ['nullable'],
            'qaipl4smL15' => ['nullable'],
            'qaipl4smL16' => ['nullable'],
            'qaipl4smL17' => ['nullable'],
            'qaipl4smL18' => ['nullable'],
            'qaipl4smL19' => ['nullable'],
            'qaipl4smMqaipl5sm' => ['nullable'],
            'qaipl4smMtotal' => ['nullable'],
            'qaipl4smM15' => ['nullable'],
            'qaipl4smM16' => ['nullable'],
            'qaipl4smM17' => ['nullable'],
            'qaipl4smM18' => ['nullable'],
            'qaipl4smM19' => ['nullable'],
            'qaipl4smNqaipl5sm' => ['nullable'],
            'qaipl4smNtotal' => ['nullable'],
            'qaipl4smN15' => ['nullable'],
            'qaipl4smN16' => ['nullable'],
            'qaipl4smN17' => ['nullable'],
            'qaipl4smN18' => ['nullable'],
            'qaipl4smN19' => ['nullable'],
            'qaipl4smOqaipl5sm' => ['nullable'],
            'qaipl4smOtotal' => ['nullable'],
            'qaipl4smO15' => ['nullable'],
            'qaipl4smO16' => ['nullable'],
            'qaipl4smO17' => ['nullable'],
            'qaipl4smO18' => ['nullable'],
            'qaipl4smO19' => ['nullable'],
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

        foreach ($sanitized as $key => $item) {
            $sanitized[$key] = $this->prepareCurrencies($item);
        }

        return $sanitized;
    }

    public function getAnoId()
    {
        if ($this->has('ano')) {
            return $this->get('ano')['id'];
        }
        return null;
    }

    public function getMesId()
    {
        if ($this->has('mes')) {
            return $this->get('mes')['id'];
        }
        return null;
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
