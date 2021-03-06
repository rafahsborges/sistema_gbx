<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MalaDireta extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'assunto',
        'conteudo',
        'id_cliente',
        'agendar',
        'agendamento',
        'enviado',
        'envio',
    ];


    protected $dates = [
        'agendamento',
        'envio',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/mala-diretas/' . $this->getKey());
    }
}
