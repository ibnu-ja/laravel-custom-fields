<?php

declare(strict_types=1);

namespace Voice\CustomFields\App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class PlainType extends Model
{
    protected $table   = 'custom_field_plain_types';
    protected $guarded = ['id'];
    protected $hidden  = ['created_at', 'updated_at'];

    public function customFields(): MorphMany
    {
        return $this->morphMany(CustomField::class, 'selectable');
    }

    public function selectionTypes(): HasMany
    {
        return $this->hasMany(SelectionType::class);
    }
}
