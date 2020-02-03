<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Estado extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'nome',
        'abreviacao',
        'enabled',
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
        return url('/admin/estados/' . $this->getKey());
    }

    /**
     * @return HasMany
     */
    public function adminUsers()
    {
        return $this->hasMany('App\Models\AdminUser', 'id_estado');
    }

    /**
     * @return HasMany
     */
    public function cidades()
    {
        return $this->hasMany('App\Models\Cidade', 'id_estado');
    }

    /**
     * @return HasMany
     */
    public function pontos()
    {
        return $this->hasMany('App\Models\Ponto', 'id_estado');
    }
}
