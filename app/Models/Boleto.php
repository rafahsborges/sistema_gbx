<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Boleto extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'valor',
        'vencimento',
        'valor_pago',
        'pagamento',
        'id_cliente',
        'status',
    
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
        return url('/admin/boletos/'.$this->getKey());
    }
}