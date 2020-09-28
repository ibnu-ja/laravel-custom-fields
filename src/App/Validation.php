<?php

declare(strict_types=1);

namespace Voice\CustomFields\App;

use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Validation extends Model
{
    use SoftDeletes;

    protected $table   = 'custom_field_validations';
    protected $guarded = ['id'];
    protected $hidden  = ['created_at', 'updated_at'];

    public function customFields(): HasMany
    {
        return $this->hasMany(CustomField::class);
    }

    public function validate($input)
    {
        $pattern = $this->regex;

        throw_if(!preg_match($pattern, "$input"), new Exception("Provided data doesn't pass $pattern validation"));
    }
}
