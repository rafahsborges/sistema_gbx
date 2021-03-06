<?php

namespace App\Models;

use App\Models\Traits\SoftDeletesWithDeleted;
use Brackets\AdminAuth\Activation\Contracts\CanActivate as CanActivateContract;
use Brackets\AdminAuth\Activation\Traits\CanActivate;
use Brackets\AdminAuth\Notifications\ResetPassword;
use Brackets\Media\HasMedia\AutoProcessMediaTrait;
use Brackets\Media\HasMedia\HasMediaCollectionsTrait;
use Brackets\Media\HasMedia\HasMediaThumbsTrait;
use Brackets\Media\HasMedia\ProcessMediaTrait;
use Illuminate\Contracts\Routing\UrlGenerator;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Image\Exceptions\InvalidManipulation;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\Models\Media;
use Spatie\Permission\Traits\HasRoles;

class AdminUser extends Authenticatable implements CanActivateContract, HasMedia
{
    use Notifiable;
    use CanActivate;
    use SoftDeletesWithDeleted;
    use HasRoles;
    use AutoProcessMediaTrait;
    use HasMediaCollectionsTrait;
    use HasMediaThumbsTrait;
    use ProcessMediaTrait;

    use LogsActivity;
    protected static $logFillable = true;

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
        'logradouro',
        'numero',
        'complemento',
        'bairro',
        'id_cidade',
        'id_estado',
        'cep',
        'vencimento',
        'valor',
        'ini_contrato',
        'fim_contrato',
        'fistel',
        'is_admin',
        'activated',
        'forbidden',
        'language',
        'enabled',
        'password',
        'id_servico',
        'desconto'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    /**
     * Resource url to generate edit
     *
     * @return UrlGenerator|string
     */
    public function getResourceUrlAttribute()
    {
        return url('/admin/admin-users/' . $this->getKey());
    }

    /**
     * Get url of avatar image
     *
     * @return string|null
     */
    public function getAvatarThumbUrlAttribute(): ?string
    {
        return $this->getFirstMediaUrl('avatar', 'thumb_150') ?: null;
    }

    /**
     * Send the password reset notification.
     *
     * @param string $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(app(ResetPassword::class, ['token' => $token]));
    }

    /* ************************ MEDIA ************************ */

    /**
     * Register media collections
     */
    public function registerMediaCollections()
    {
        $this->addMediaCollection('avatar')
            ->accepts('image/*');
    }

    /**
     * Register media conversions
     *
     * @param Media|null $media
     * @throws InvalidManipulation
     */
    public function registerMediaConversions(Media $media = null)
    {
        $this->autoRegisterThumb200();

        $this->addMediaConversion('thumb_75')
            ->width(75)
            ->height(75)
            ->fit('crop', 75, 75)
            ->optimize()
            ->performOnCollections('avatar')
            ->nonQueued();

        $this->addMediaConversion('thumb_150')
            ->width(150)
            ->height(150)
            ->fit('crop', 150, 150)
            ->optimize()
            ->performOnCollections('avatar')
            ->nonQueued();
    }

    /**
     * Auto register thumb overridden
     */
    public function autoRegisterThumb200()
    {
        $this->getMediaCollections()->filter->isImage()->each(function ($mediaCollection) {
            $this->addMediaConversion('thumb_200')
                ->width(200)
                ->height(200)
                ->fit('crop', 200, 200)
                ->optimize()
                ->performOnCollections($mediaCollection->getName())
                ->nonQueued();
        });
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

    /**
     * @return BelongsTo
     */
    public function servico()
    {
        return $this->belongsTo('App\Models\Servico', 'id_servico');
    }

    /**
     * @return HasMany
     */
    public function apontamentos()
    {
        return $this->hasMany('App\Models\Apontamento', 'id_cliente');
    }

    /**
     * @return HasMany
     */
    public function pontos()
    {
        return $this->hasMany('App\Models\Ponto', 'id_cliente');
    }

    /**
     * @return HasMany
     */
    public function representantes()
    {
        return $this->hasMany('App\Models\Representante', 'id_cliente');
    }

    /**
     * A user can have many messages
     *
     * @return HasMany
     */
    public function messages()
    {
        return $this->hasMany('App\Models\Message', 'user_id');
    }

}
