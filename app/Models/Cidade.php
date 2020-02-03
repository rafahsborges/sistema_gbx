<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cidade extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'nome',
        'ibge_code',
        'id_estado',
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
        return url('/admin/cidades/' . $this->getKey());
    }

    /**
     * @return BelongsTo
     */
    public function estado()
    {
        return $this->belongsTo('App\Models\Estado', 'id_estado');
    }

    /**
     * @return HasMany
     */
    public function adminUsers()
    {
        return $this->hasMany('App\Models\AdminUser', 'id_cidade');
    }

    /**
     * @return HasMany
     */
    public function pontos()
    {
        return $this->hasMany('App\Models\Ponto', 'id_cidade');
    }
}
