<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IngredientUsage extends Model
{
    protected $fillable = ['ingredient_id', 'amount_used'];

    public function ingredient()
    {
        return $this->belongsTo(Ingredient::class);
    }
}
