<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DigitalMenu extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'image_path',
        'category',
        'dietary_preferences',
        'allergens',
        'nutritional_info',
        'is_special_offer',
        'schedule_start',
        'schedule_end',
        'layout_type'
    ];
    protected $casts = [
        'dietary_preferences' => 'array',
        'allergens' => 'array',
        'is_special_offer' => 'boolean',
        'schedule_start' => 'datetime',
        'schedule_end' => 'datetime'
    ];
    public function isActive()
    {
        $now = now();
        if ($this->schedule_start && $this->schedule_end) {
            return $now->between($this->schedule_start, $this->schedule_end);
        }
        return true;
    }
}
