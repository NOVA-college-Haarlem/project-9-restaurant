<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    // Dit geeft aan welke velden massaal mogen worden ingevuld
    protected $fillable = [
        'title',          // De titel van het event
        'description',    // De beschrijving van het event
        'event_date',     // De datum en tijd van het event
    ];

    // Als je geen mass assignment wilt toestaan, kun je de volgende regel gebruiken:
    // protected $guarded = [];
}
