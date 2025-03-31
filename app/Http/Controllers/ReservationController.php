<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function create()
    {
        return view('reservation.blade.php');
    }

    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'guests' => 'required|integer|min:1',
            'requests' => 'nullable|string',
        ]);



        return redirect()->route('reservation.blade.php')->with('success', 'Reservering succesvol ontvangen!');
    }
}
