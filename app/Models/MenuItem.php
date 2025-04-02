<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use HasFactory;


class MenuItem extends Model
{

    protected $fillable = [
        'name', 'description', 'prijs', 'cost', 'popularity',
        'calories', 'protein', 'carbs', 'fat',
        'allergens', 'vegetarian', 'vegan', 'gluten_free'
    ];
    public function getProfitAttribute()
    {
        return $this->price - $this->cost; // Winstberekening
    }
}
