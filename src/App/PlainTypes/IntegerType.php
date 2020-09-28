<?php

declare(strict_types=1);

namespace Voice\CustomFields\App\PlainTypes;

use Illuminate\Database\Eloquent\Builder;
use Voice\CustomFields\App\Contracts\Mappable;
use Voice\CustomFields\App\PlainType;

class IntegerType extends PlainType implements Mappable
{
    protected static function booted()
    {
        static::addGlobalScope('name', function (Builder $builder) {
            $builder->where('name', 'integer');
        });
    }

    public function mapToColumn(): string
    {
        return 'integer';
    }
}
