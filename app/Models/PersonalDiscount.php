<?php

namespace App\Models;

class PersonalDiscount extends Discount
{
    protected $fillable = [];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->fillable = array_merge(
            parent::getFillable(),
            ['application_date']
        );
    }

    protected function casts(): array
    {
        return [
            'application_date' => 'datetime',
        ];
    }
}

