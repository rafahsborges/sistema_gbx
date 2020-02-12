<?php

namespace App\Models;

use Brackets\Media\HasMedia\AutoProcessMediaTrait;
use Brackets\Media\HasMedia\HasMediaCollectionsTrait;
use Brackets\Media\HasMedia\HasMediaThumbsTrait;
use Brackets\Media\HasMedia\ProcessMediaTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\Models\Media;

class Orcamento extends Model implements HasMedia
{
    use SoftDeletes;

    use ProcessMediaTrait;
    use AutoProcessMediaTrait;
    use HasMediaCollectionsTrait;
    use HasMediaThumbsTrait;

    protected $fillable = [
        'tipo',
        'nome',
        'razao_social',
        'cpf',
        'cnpj',
        'email',
        'email2',
        'email3',
        'telefone',
        'celular',
        'id_cidade',
        'id_estado',
        'assunto',
        'conteudo',
        'enviar',
        'agendar',
        'agendamento',
        'enviado',
        'envio',
    ];


    protected $dates = [
        'agendamento',
        'envio',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/orcamentos/' . $this->getKey());
    }

    public function registerMediaCollections()
    {
        $this->addMediaCollection('gallery')
            ->accepts('image/*')
            ->maxNumberOfFiles(20);

        $this->addMediaCollection('pdf')
            ->accepts('application/pdf');
    }

    public function registerMediaConversions(Media $media = null)
    {
        $this->autoRegisterThumb200();
    }

    /* ************************ RELATIONS ************************ */

    /**
     * @return BelongsTo
     */
    public function estado()
    {
        return $this->belongsTo('App\Models\Estado', 'id_estado');
    }

    /**
     * @return BelongsTo
     */
    public function cidade()
    {
        return $this->belongsTo('App\Models\Cidade', 'id_cidade');
    }

}
