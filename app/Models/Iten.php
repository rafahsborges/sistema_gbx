<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Iten extends Model
{
    protected $fillable = [
        'nome',
        'id_etapa',
        'id_status',
    
    ];
    
    
    protected $dates = [
        'created_at',
        'updated_at',
    
    ];
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/itens/'.$this->getKey());
    }
}
