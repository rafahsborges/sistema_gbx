<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Orcamento extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'tipo',
        'nome',
        'razao_social',
        'cpf',
        'cnpj',
        'email',
        'email2',
        'email3',
        'telefone',
        'celular',
        'id_cidade',
        'id_estado',
        'assunto',
        'conteudo',
        'enviar',
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
        return url('/admin/orcamentos/'.$this->getKey());
    }
}
