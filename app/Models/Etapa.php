<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class Etapa extends Model
{
    use SoftDeletes;

    use LogsActivity;
    protected static $logFillable = true;

    protected $fillable = [
        'nome',
        'id_servico',
        'id_status',
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
        return url('/admin/etapas/'.$this->getKey());
    }

    /**
     * @return BelongsTo
     */
    public function status() {
        return $this->belongsTo('App\Models\Status', 'id_status');
    }

    /**
     * @return BelongsTo
     */
    public function servico() {
        return $this->belongsTo('App\Models\Servico', 'id_servico');
    }
}
