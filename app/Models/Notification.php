<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Notification extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'assunto',
        'conteudo',
        'id_cliente',
        'agendar',
        'agendamento',
        'enviado',
    
    ];
    
    
    protected $dates = [
        'agendamento',
        'created_at',
        'updated_at',
        'deleted_at',
    
    ];
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/notifications/'.$this->getKey());
    }
}
