<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_name',
        'user_email',
        'rating',
        'food_comment',
        'service_comment',
        'ambiance_comment',
        'photo_path',
        'is_public',
        'admin_response'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
