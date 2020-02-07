<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class Apontamento extends Model
{
    use SoftDeletes;

    use LogsActivity;
    protected static $logFillable = true;

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
        return url('/admin/apontamentos/'.$this->getKey());
    }

    public function cliente() {
        return $this->belongsTo('App\Models\AdminUser', 'id_cliente');
    }
}
