<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class Servico extends Model
{
    use SoftDeletes;

    use LogsActivity;
    protected static $logFillable = true;

    protected $fillable = [
        'nome',
        'valor',
        'orgao',
        'descricao',
        'id_etapa',
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
        return url('/admin/servicos/'.$this->getKey());
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
    public function etapa() {
        return $this->belongsTo('App\Models\Etapa', 'id_etapa');
    }
}
