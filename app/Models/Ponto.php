<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ponto extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'nome',
        'logradouro',
        'numero',
        'complemento',
        'bairro',
        'cidade',
        'uf',
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
}
