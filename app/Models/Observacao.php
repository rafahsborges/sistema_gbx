<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Observacao extends Model
{
    use SoftDeletes;

    protected $table = 'observacoes';

    protected $fillable = [
        'descricao',
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
        return url('/admin/observacoes/'.$this->getKey());
    }
}
