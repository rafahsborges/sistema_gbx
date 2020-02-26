<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sici extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'ano',
        'mes',
        'id_cliente',
        'id_servico',
        'fistel',
        'id_cidade',
        'id_estado',
        'iem1a',
        'iem1b',
        'iem1c',
        'iem1d',
        'iem1e',
        'iem1f',
        'iem1g',
        'iem2a',
        'iem2b',
        'iem2c',
        'iem3a',
        'iem4a',
        'iem5a',
        'iem6a',
        'iem7a',
        'iem8a',
        'iem8b',
        'iem8c',
        'iem8d',
        'iem8e',
        'iem9Fa',
        'iem9Fb',
        'iem9Fc',
        'iem9Fd',
        'iem9Fe',
        'iem9Ja',
        'iem9Jb',
        'iem9Jc',
        'iem9Jd',
        'iem9Je',
        'iem10Fa',
        'iem10Fb',
        'iem10Fc',
        'iem10Fd',
        'iem10Ja',
        'iem10Jb',
        'iem10Jc',
        'iem10Jd',
        'iau1',
        'ipl1a',
        'ipl1b',
        'ipl1c',
        'ipl1d',
        'ipl2a',
        'ipl2b',
        'ipl2c',
        'ipl2d',
        'ipl3Fa',
        'ipl3Ja',
        'ipl6im',
        'qaipl4smAqaipl5sm',
        'qaipl4smAtotal',
        'qaipl4smA15',
        'qaipl4smA16',
        'qaipl4smA17',
        'qaipl4smA18',
        'qaipl4smA19',
        'qaipl4smBqaipl5sm',
        'qaipl4smBtotal',
        'qaipl4smB15',
        'qaipl4smB16',
        'qaipl4smB17',
        'qaipl4smB18',
        'qaipl4smB19',
        'qaipl4smCqaipl5sm',
        'qaipl4smCtotal',
        'qaipl4smC15',
        'qaipl4smC16',
        'qaipl4smC17',
        'qaipl4smC18',
        'qaipl4smC19',
        'qaipl4smDqaipl5sm',
        'qaipl4smDtotal',
        'qaipl4smD15',
        'qaipl4smD16',
        'qaipl4smD17',
        'qaipl4smD18',
        'qaipl4smD19',
        'qaipl4smEqaipl5sm',
        'qaipl4smEtotal',
        'qaipl4smE15',
        'qaipl4smE16',
        'qaipl4smE17',
        'qaipl4smE18',
        'qaipl4smE19',
        'qaipl4smFqaipl5sm',
        'qaipl4smFtotal',
        'qaipl4smF15',
        'qaipl4smF16',
        'qaipl4smF17',
        'qaipl4smF18',
        'qaipl4smF19',
        'qaipl4smGqaipl5sm',
        'qaipl4smGtotal',
        'qaipl4smG15',
        'qaipl4smG16',
        'qaipl4smG17',
        'qaipl4smG18',
        'qaipl4smG19',
        'qaipl4smHqaipl5sm',
        'qaipl4smHtotal',
        'qaipl4smH15',
        'qaipl4smH16',
        'qaipl4smH17',
        'qaipl4smH18',
        'qaipl4smH19',
        'qaipl4smIqaipl5sm',
        'qaipl4smItotal',
        'qaipl4smI15',
        'qaipl4smI16',
        'qaipl4smI17',
        'qaipl4smI18',
        'qaipl4smI19',
        'qaipl4smJqaipl5sm',
        'qaipl4smJtotal',
        'qaipl4smJ15',
        'qaipl4smJ16',
        'qaipl4smJ17',
        'qaipl4smJ18',
        'qaipl4smJ19',
        'qaipl4smKqaipl5sm',
        'qaipl4smKtotal',
        'qaipl4smK15',
        'qaipl4smK16',
        'qaipl4smK17',
        'qaipl4smK18',
        'qaipl4smK19',
        'qaipl4smLqaipl5sm',
        'qaipl4smLtotal',
        'qaipl4smL15',
        'qaipl4smL16',
        'qaipl4smL17',
        'qaipl4smL18',
        'qaipl4smL19',
        'qaipl4smMqaipl5sm',
        'qaipl4smMtotal',
        'qaipl4smM15',
        'qaipl4smM16',
        'qaipl4smM17',
        'qaipl4smM18',
        'qaipl4smM19',
        'qaipl4smNqaipl5sm',
        'qaipl4smNtotal',
        'qaipl4smN15',
        'qaipl4smN16',
        'qaipl4smN17',
        'qaipl4smN18',
        'qaipl4smN19',
        'qaipl4smOqaipl5sm',
        'qaipl4smOtotal',
        'qaipl4smO15',
        'qaipl4smO16',
        'qaipl4smO17',
        'qaipl4smO18',
        'qaipl4smO19',
        'status',
    ];


    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/sicis/'.$this->getKey());
    }

    /**
     * @return BelongsTo
     */
    public function cliente()
    {
        return $this->belongsTo('App\Models\AdminUser', 'id_cliente');
    }

    /**
     * @return BelongsTo
     */
    public function servico()
    {
        return $this->belongsTo('App\Models\Servico', 'id_servico');
    }

    /**
     * @return BelongsTo
     */
    public function estado()
    {
        return $this->belongsTo('App\Models\Estado', 'id_estado');
    }

    /**
     * @return BelongsTo
     */
    public function cidade()
    {
        return $this->belongsTo('App\Models\Cidade', 'id_cidade');
    }
}
