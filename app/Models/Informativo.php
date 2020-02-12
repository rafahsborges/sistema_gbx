<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Informativo extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'assunto',
        'conteudo',
        'id_servico',

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
        return url('/admin/informativos/' . $this->getKey());
    }
}
