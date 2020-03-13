<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Boleto extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'descricao',
        'valor',
        'vencimento',
        'valor_pago',
        'pagamento',
        'id_cliente',
        'id_servico',
        'gerar',
        'status',
        'juno_id',
    ];


    protected $dates = [
        'vencimento',
        'pagamento',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/boletos/' . $this->getKey());
    }

    /**
     * @return BelongsTo
     */
    public function cliente()
    {
        return $this->belongsTo('App\Models\AdminUser', 'id_cliente');
    }
}
