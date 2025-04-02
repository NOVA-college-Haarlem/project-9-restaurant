<?php

namespace App\Http\Controllers;

use App\Models\Absence;
use App\Models\User;
use Illuminate\Http\Request;

class AbsenceController extends Controller
{
    public function create()
    {
        $users = User::all();
        return view('absences.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'reason' => 'nullable|string',
        ]);

        Absence::create($request->all());

        return redirect()->route('absences.create')->with('success', 'Afwezigheid succesvol geregistreerd!');
    }

    public function index()
    {
        $absences = Absence::with('user')
            ->orderBy('start_date')
            ->get()
            ->each(function ($absence) {
                $absence->start_date = \Carbon\Carbon::parse($absence->start_date);
                $absence->end_date = \Carbon\Carbon::parse($absence->end_date);
            });

        return view('absences.index', compact('absences'));
    }
}
