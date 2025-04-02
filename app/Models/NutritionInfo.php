<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NutritionInfo extends Model
{
    protected $fillable = ['menu_item_id', 'calories', 'protein', 'carbs', 'fats', 'allergens'];

    public function menuItem()
    {
        return $this->belongsTo(MenuItem::class);
    }
}
