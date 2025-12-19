<?php

namespace App\Models;

class GlobalDiscount extends Discount
{
    protected $fillable = [
        'start_date',
        'end_date',
        'code',
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->fillable = array_merge(
            parent::getFillable(),
            ['start_date', 'end_date', 'code']
        );
    }

    protected function casts(): array
    {
        return [
            'start_date' => 'datetime',
            'end_date' => 'datetime',
        ];
    }
}
