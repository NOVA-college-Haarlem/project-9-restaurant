<?php

namespace App\Http\Controllers;

use App\Models\Shift;
use App\Models\User;
use Illuminate\Http\Request;

class ShiftController extends Controller
{


    public function index(User $user)
    {

        return view('shifts.index', []);
    }

    public function create()
    {
        $staff = User::where('role', 'staff')->get();
        $user = $staff->first(); // or get the user from request/URL
        return view('users.shifts_create', compact('user', 'staff'));
    }
    public function store(Request $request, User $user)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
        ]);

        Shift::create([
            'user_id' => $request->user_id,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'status' => 'assigned'
        ]);

        // Redirect to the user's shifts page
        return redirect()->route('shifts.user', $request->user_id)->with('success', 'Shift toegevoegd!');
    }
    public function updateStatus(Shift $shift)
    {
        $shift->update(['status' => 'worked']);
        return back()->with('success', 'Shift status bijgewerkt!');
    }

    public function shifts_user(User $user)
    {
        // Eager load de shifts met de user relatie
        $shifts = Shift::with('user')
            ->where('user_id', $user->id)
            ->orderBy('start_time', 'desc')
            ->get();

        // Bereken totale gewerkte tijd
        $totalWorkedTime = $shifts->where('status', 'worked')
            ->sum(function ($shift) {
                return strtotime($shift->end_time) - strtotime($shift->start_time);
            });

        $totalHours = floor($totalWorkedTime / 3600);
        $totalMinutes = floor(($totalWorkedTime % 3600) / 60);




        $shifts = Shift::where('user_id', $user->id)->get();
        return view('users.shifts', compact('shifts', 'user', 'totalHours', 'totalMinutes'));
    }
}
