<?php

namespace App\Models\Traits;

use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Scopes\SoftDeletingWithDeletesScope;

trait SoftDeletesWithDeleted
{
    use SoftDeletes;

    public static function bootSoftDeletes()
    {
        static::addGlobalScope(new SoftDeletingWithDeletesScope);
    }
}
