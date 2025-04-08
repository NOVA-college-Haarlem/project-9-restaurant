<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IngredientOrder extends Model
{
    protected $fillable = [
        'ingredient_name',
        'quantity',
        'supplier',
        'status',
        'delivery_date',
        'received_quantity',
    ];

    protected $dates = ['delivery_date', 'expected_delivery'];
}
