<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Message extends Model
{
    use SoftDeletes;

    /**
     * Fields that are mass assignable
     *
     * @var array
     */
    protected $fillable = ['message'];

    /* ************************ RELATIONS ************************ */

    /**
     * A message belong to a user
     *
     * @return BelongsTo
     */
    public function cliente()
    {
        return $this->belongsTo(AdminUser::class);
    }

}
