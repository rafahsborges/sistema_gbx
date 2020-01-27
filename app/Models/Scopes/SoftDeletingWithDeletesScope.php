<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SoftDeletingWithDeletesScope extends SoftDeletingScope
{
    public function apply(Builder $builder, Model $model)
    {
        //
    }
}
