<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Waitlist extends Model
{
    use HasFactory;

    // Velden die massaal kunnen worden ingevuld
    protected $fillable = [
        'user_id', 
        'party_size', 
        'estimated_wait_time'
    ];
    public function user()
{
    return $this->belongsTo(User::class, 'user_id');
}

}

