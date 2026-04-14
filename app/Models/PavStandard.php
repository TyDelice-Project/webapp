<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PavStandard extends Model
{

    protected $fillable = ['name', 'pav_id'];

    public function pav(): BelongsTo
    {
        return $this->belongsTo(Pav::class);
    }
}
