<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{

    public function show($id)
    {
    $reservation = Reservation::findOrFail($id); // Haal de reservering op via het id
    return view('reservations.show', compact('reservation')); // Toon de reservering in de view
    }   

    // To show the list of reservations
    public function index()
    {
        $reservations = Reservation::all();
        return view('reservations.index', compact('reservations'));
    }

    // To show the reservation creation form
    public function create()
    {
        return view('reservations.create');
    }

    // Store new reservation
    public function store(Request $request)
    {
        // Validate the request
        $validatedData = $request->validate([
            'date' => 'required|date',
            'guests' => 'required|integer|min:1',
            'requests' => 'nullable|string',
        ]);

        // Create the reservation
        Reservation::create($validatedData);

        // Redirect with success message
        return redirect()->route('reservations.index')->with('success', 'Reservering succesvol ontvangen!');
    }

    // To show the edit form for a reservation
    public function edit(Reservation $reservation)
    {
        return view('reservations.edit', compact('reservation'));
    }

    // Update the reservation
    public function update(Request $request, Reservation $reservation)
    {
        // Validate the request
        $validatedData = $request->validate([
            'date' => 'required|date',
            'guests' => 'required|integer|min:1',
            'requests' => 'nullable|string',
        ]);

        // Update the reservation
        $reservation->update($validatedData);

        // Redirect with success message
        return redirect()->route('reservations.index')->with('success', 'Reservering bijgewerkt!');
    }

    // Delete a reservation
    public function destroy(Reservation $reservation)
    {
        // Delete the reservation
        $reservation->delete();

        // Redirect with success message
        return redirect()->route('reservations.index')->with('success', 'Reservering geannuleerd!');
    }

    public function calendar()
    {
        $reservations = Reservation::all();
        return view('reservations.calendar', compact('reservations'));
    }
}    