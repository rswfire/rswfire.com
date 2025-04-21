<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

abstract class BaseModel extends Model
{
    const CREATED_AT = "stamp_created";
    const UPDATED_AT = "stamp_updated";

    public $timestamps = true;
    protected $keyType = "string";
    public $incrementing = false;

    protected static function booted(): void
    {
        static::creating(function ($model) {
            $key = $model->getKeyName();

            if ($model->incrementing === false && $model->keyType === "string") {
                if (empty($model->{$key})) {
                    $model->{$key} = strtoupper((string) Str::ulid());
                } else {
                    $model->{$key} = strtoupper($model->{$key});
                }
            }
        });
    }

}
