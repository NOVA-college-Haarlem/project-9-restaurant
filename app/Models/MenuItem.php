<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use HasFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory as FactoriesHasFactory;

class MenuItem extends Model
{
    use FactoriesHasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'cost',
        'popularity',
        'calories',
        'protein',
        'carbs',
        'fat',
        'allergens',
        'vegetarian',
        'vegan',
        'gluten_free',
        'category'
    ];

    // Accessor for dietary preferences
    public function getDietaryPreferencesAttribute()
    {
        $preferences = [];
        if ($this->vegetarian) {
            $preferences[] = 'vegetarian';
        }
        if ($this->vegan) {
            $preferences[] = 'vegan';
        }
        if ($this->gluten_free) {
            $preferences[] = 'gluten_free';
        }
        return $preferences;
    }

    public function getProfitAttribute()
    {
        return $this->price - $this->cost;
    }
    
}
