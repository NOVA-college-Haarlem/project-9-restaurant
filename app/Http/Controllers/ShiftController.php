<?php

namespace App\Http\Controllers;

use App\Models\Shift;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ShiftController extends Controller
{
    public function index()
    {
        $shifts = Shift::with('user')
            ->orderBy('start_time', 'desc')
            ->get();

        return view('shifts.index', compact('shifts'));
    }

    public function create()
    {
        return view('shifts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date|after_or_equal:today',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
        ]);

        // Combine date with time
        $startDateTime = Carbon::createFromFormat('Y-m-d H:i', $request->date . ' ' . $request->start_time);
        $endDateTime = Carbon::createFromFormat('Y-m-d H:i', $request->date . ' ' . $request->end_time);

        // If end time is before start time (crossing midnight), add a day to end time
        if ($endDateTime->lt($startDateTime)) {
            $endDateTime->addDay();
        }

        Shift::create([
            'start_time' => $startDateTime,
            'end_time' => $endDateTime,
            'status' => 'unassigned'
        ]);

        return redirect()->route('shifts.index')
            ->with('success', 'Shift created successfully!');
    }

    public function assign(Request $request, Shift $shift)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id'
        ]);

        $shift->update([
            'user_id' => $request->user_id,
            'status' => 'assigned'
        ]);

        return back()->with('success', 'Shift assigned successfully!');
    }

    public function updateStatus(Shift $shift)
    {
        $shift->update(['status' => 'worked']);
        return back()->with('success', 'Shift status updated!');
    }

    public function schedule(Request $request)
    {
        $view = $request->input('view', 'week');
        $staff = User::where('role', 'staff')->get();

        if ($view === 'week') {
            $startDate = now()->startOfWeek();
            $endDate = now()->endOfWeek();
        } else {
            $startDate = now()->startOfMonth();
            $endDate = now()->endOfMonth();
        }

        $shifts = Shift::with('user')
            ->whereBetween('start_time', [$startDate, $endDate])
            ->orderBy('start_time')
            ->get()
            ->groupBy(function ($shift) {
                return $shift->start_time->format('Y-m-d');
            });

        return view('shifts.schedule', [
            'shiftsByDay' => $shifts,
            'startDate' => $startDate,
            'endDate' => $endDate,
            'viewType' => $view,
            'staff' => $staff
        ]);
    }
    public function show(Shift $shift)
    {
        return view('shifts.show', compact('shift'));
    }   
}
