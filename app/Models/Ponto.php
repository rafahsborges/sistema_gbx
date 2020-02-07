<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class Ponto extends Model
{
    use SoftDeletes;

    use LogsActivity;
    protected static $logFillable = true;

    protected $fillable = [
        'nome',
        'logradouro',
        'numero',
        'complemento',
        'bairro',
        'id_cidade',
        'id_estado',
        'cep',
        'estacao',
        'entidade',
        'latitude',
        'longitude',
        'altura',
        'id_cliente',
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
        return url('/admin/pontos/'.$this->getKey());
    }

    /**
     * @return BelongsTo
     */
    public function cliente() {
        return $this->belongsTo('App\Models\AdminUser', 'id_cliente');
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
