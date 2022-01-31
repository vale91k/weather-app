<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin Builder
 */
class City extends Model
{
    use HasFactory;

    const DEFAULT_CITY_ID = 1;

    public function forecasts(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Forecast::class);
    }
}
