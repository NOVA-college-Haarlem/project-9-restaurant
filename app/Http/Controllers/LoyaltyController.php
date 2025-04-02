<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LoyaltyPoint;
use App\Models\Reward;

class LoyaltyController extends Controller
{
    public function index()
    {
        // Haal alle loyaliteitspunten op
        $history = LoyaltyPoint::all();

        // Standaard waarde voor totalPoints
        $totalPoints = null;

        // Als de gebruiker ingelogd is, haal dan de totalen van loyaliteitspunten op
        if (auth()->check()) {
            $totalPoints = LoyaltyPoint::where('email', auth()->user()->email)->sum('points');
        }

        // Haal alle rewards op die beschikbaar zijn voor inwisseling
        $rewards = Reward::all();

        // Stuur zowel history, totalPoints als rewards naar de view
        return view('loyalty.index', compact('totalPoints', 'history', 'rewards'));
    }

    public function earnPoints(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'amount' => 'required|numeric|min:1',
        ]);

        $pointsEarned = $request->amount * 10;  // 10 punten per eenheid van het bedrag

        // Maak een nieuw record aan voor de loyaliteitspunten
        LoyaltyPoint::create([
            'name' => $request->name,
            'email' => $request->email,
            'points' => $pointsEarned,
        ]);

        // Redirect back met een succesbericht
        return redirect()->back()->with('success', "Je hebt $pointsEarned punten verdiend!");
    }

    public function checkPoints(Request $request)
    {
        

        $totalPoints = LoyaltyPoint::where('email', $request->email)->sum('points');

        return view('loyalty.check', compact('totalPoints'));
    }

    public function redeemPoints(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'reward_id' => 'required|exists:rewards,id',
        ]);

        $totalPoints = LoyaltyPoint::where('email', $request->email)->sum('points');
        $reward = Reward::find($request->reward_id);

        // Controleer of de gebruiker voldoende punten heeft voor de beloning
        if ($totalPoints < $reward->points_required) {
            return redirect()->back()->with('error', 'Niet genoeg punten!');
        }

        // Verlaag het aantal punten van de gebruiker met het aantal vereiste punten voor de beloning
        LoyaltyPoint::create([
            'email' => $request->email,
            'points' => -$reward->points_required,  // Punten afhalen
        ]);

        // Succesbericht na het inwisselen van de beloning
        return redirect()->back()->with('success', "Je hebt {$reward->name} ingewisseld!");
    }
}
