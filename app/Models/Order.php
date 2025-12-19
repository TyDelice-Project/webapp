<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    protected $fillable = [
        'creation_date',
        'validation_date',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'creation_date' => 'datetime',
            'validation_date' => 'datetime',
        ];
    }

    public function invoices(): HasMany {
        return $this->hasMany(Invoice::class);
    }

//    TODO : verifier et ajouter relation avec PAV
//    TODO : ajouter relation avec utilisateur
}
