<?php

namespace App\Models;

use Brackets\Media\HasMedia\AutoProcessMediaTrait;
use Brackets\Media\HasMedia\HasMediaCollectionsTrait;
use Brackets\Media\HasMedia\HasMediaThumbsTrait;
use Brackets\Media\HasMedia\ProcessMediaTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\Models\Media;

class Servico extends Model implements HasMedia
{
    use SoftDeletes;

    use ProcessMediaTrait;
    use AutoProcessMediaTrait;
    use HasMediaCollectionsTrait;
    use HasMediaThumbsTrait;

    use LogsActivity;
    protected static $logFillable = true;

    protected $fillable = [
        'nome',
        'valor',
        'orgao',
        'descricao',
        'id_etapa',
        'id_status',
        'observacao',
        'documento',
        'valido',
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
        return url('/admin/servicos/' . $this->getKey());
    }

    public function registerMediaCollections()
    {
        $this->addMediaCollection('gallery')
            ->accepts('image/*')
            ->maxNumberOfFiles(10);

        $this->addMediaCollection('pdf')
            ->accepts('application/pdf')
            ->maxNumberOfFiles(10);
    }

    public function registerMediaConversions(Media $media = null)
    {
        $this->autoRegisterThumb200();
    }

    /**
     * @return BelongsTo
     */
    public function status()
    {
        return $this->belongsTo('App\Models\Status', 'id_status');
    }

    /**
     * @return BelongsTo
     */
    public function etapa()
    {
        return $this->belongsTo('App\Models\Etapa', 'id_etapa');
    }
}
