<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class Representante extends Model
{
    use SoftDeletes;

    use LogsActivity;
    protected static $logFillable = true;

    protected $fillable = [
        'nome',
        'email',
        'telefone',
        'celular',
        'cargo',
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
        return url('/admin/representantes/' . $this->getKey());
    }

    public function cliente()
    {
        return $this->belongsTo('App\Models\AdminUser', 'id_cliente');
    }
}
