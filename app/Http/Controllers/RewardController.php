<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reward;

class RewardController extends Controller
{
    public function index()
    {
        $rewards = Reward::all();
        return view('rewards.index', compact('rewards'));
    }

    public function create()
    {
        return view('rewards.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'points_required' => 'required|integer|min:1',
        ]);

        Reward::create($request->all());
        return redirect()->route('rewards.index')->with('success', 'Beloning toegevoegd!');
    }
}
