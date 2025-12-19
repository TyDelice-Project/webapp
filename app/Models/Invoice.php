<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Invoice extends Model {
    protected $fillable = [
        'invoice_date',
        'status',
        'shipping_costs',
    ];

    protected $guarded = [
        'id'
    ];

    protected function casts(): array
    {
        return [
            'invoice_date' => 'datetime',
            'shipping_costs' => 'decimal:2'
        ];
    }

    /**
     * Get the lines associated with this invoice.
     *
     * @return HasMany<InvoiceLine>
     */
    public function lines(): HasMany
    {
        return $this->hasMany(InvoiceLine::class);
    }

    public function order(): BelongsTo {
        return $this->belongsTo(Order::class);
    }

    public function discount(): BelongsTo
    {
        return $this->belongsTo(Discount::class);
    }
}
