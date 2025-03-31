<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::all();
        return view('reservations.index', compact('reservations'));
    }

    public function create()
    {
        return view('Reservations.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'guests' => 'required|integer|min:1',
            'requests' => 'nullable|string',
        ]);

        Reservation::create($request->all());

        return redirect()->route('reservations.index')->with('success', 'Reservering succesvol ontvangen!');
    }

    public function edit(Reservation $reservation)
    {
        return view('reservations.edit', compact('reservation'));
    }

    public function update(Request $request, Reservation $reservation)
    {
        $request->validate([
            'date' => 'required|date',
            'guests' => 'required|integer|min:1',
            'requests' => 'nullable|string',
        ]);

        $reservation->update($request->all());

        return redirect()->route('reservations.index')->with('success', 'Reservering bijgewerkt!');
    }

    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
        return redirect()->route('reservations.index')->with('success', 'Reservering geannuleerd!');
    }

    public function calendar()
    {
        $reservations = Reservation::all();
        return view('reservations.calendar', compact('reservations'));
    }
}
