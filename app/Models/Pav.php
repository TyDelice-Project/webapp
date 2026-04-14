<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Pav extends Model
{
    protected $fillable = [
        'nb_levels',
    ];

    public function pavStandard(): HasOne
    {
        return $this->hasOne(PavStandard::class);
    }

    public function pavCustom(): HasOne
    {
        return $this->hasOne(PavCustom::class);
    }

    /**
     * Get the levels associated with the Pav.
     * @return BelongsToMany
     */
    public function levels(): BelongsToMany
    {
        return $this->belongsToMany(Level::class)->withPivot('qte');
    }

    /**
     * The lines that belong to the Pav.
     * @return BelongsToMany
     */
    public function lines(): BelongsToMany
    {
        return $this->belongsToMany(Line::class);
    }
}
