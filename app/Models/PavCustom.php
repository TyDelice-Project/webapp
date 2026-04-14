<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PavCustom extends Model
{
    /**
     * The attributes that are mass assignable.
     * @var string[]
     */
    protected $fillable = [
        'name',
        'pav_id',
    ];


    /**
     * Get the pav that owns the PavCustom.
     * @return BelongsTo
     */
    public function pav(): BelongsTo
    {
        return $this->belongsTo(Pav::class);
    }

}
