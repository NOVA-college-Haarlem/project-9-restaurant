<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'status', 'delivery_type', 'total_price'];

    // Relatie naar order items
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    // Relatie naar de gebruiker
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
