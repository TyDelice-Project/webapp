<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Level extends Model
{

    protected $fillable = [
        'name',
    ];

    protected $guarded = ['id'];

    public function pavs(): BelongsToMany
    {
        return $this->belongsToMany(Pav::class)->withPivot('qte');
    }

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }

    public function pav(): BelongsToMany
    {
        return $this->pavs();
    }
}
