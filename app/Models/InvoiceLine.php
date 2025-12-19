<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class InvoiceLine extends Model {
    protected $fillable = [
        'unit_price',
        'quantity',
    ];

    protected $guarded = [
        'id'
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array {
        return [
            'unit_price' => 'decimal:2',
            'quantity' => 'integer',
        ];
    }

    /**
     * Get the invoice associated with this line.
     *
     * @return BelongsTo<Invoice>
     */
    public function invoice(): BelongsTo
    {
        return $this->BelongsTo(Invoice::class);
    }

//    TODO : AJOUTER RELATION AVEC PAVS
}
