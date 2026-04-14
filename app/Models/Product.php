<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{

    protected $fillable = [
        'name',
        'price',
        'weight',
        'ingredients',
        'InStock',
    ];

    protected $guarded = ['ref'];

    public function levels(): BelongsToMany
    {
        return $this->belongsToMany(Level::class);
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    public function category(): BelongsToMany
    {
        return $this->categories();
    }
}
