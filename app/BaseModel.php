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

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (
                $model->usesUlidAsPrimaryKey() &&
                empty($model->{$model->getKeyName()})
            ) {
                $model->{$model->getKeyName()} = strtoupper((string) Str::ulid());
            }
        });
    }

    public function usesUlidAsPrimaryKey(): bool
    {
        return str_contains($this->primaryKey, "id") && $this->keyType === "string";
    }
}
