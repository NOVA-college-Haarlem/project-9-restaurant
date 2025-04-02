<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LoyaltyPoint;
use App\Models\Reward;

class LoyaltyController extends Controller
{
    public function index()
    {
        $history = LoyaltyPoint::all();
        dd($history);
        $totalPoints = null;
        if (auth()->check()) {
           
            $totalPoints = LoyaltyPoint::where('email', auth()->user()->email)->sum('points');
        }
    
        return view('loyalty.index', compact('totalPoints'));
    }
    

    public function earnPoints(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'amount' => 'required|numeric|min:1',
        ]);

        $pointsEarned = $request->amount * 10; 

        LoyaltyPoint::create([
            'name' => $request->name,
            'email' => $request->email,
            'points' => $pointsEarned,
        ]);

        return redirect()->back()->with('success', "Je hebt $pointsEarned punten verdiend!");
    }

    public function checkPoints(Request $request)
    {
        $request->validate(['email' => 'required|email']);
    
        $totalPoints = LoyaltyPoint::where('email', $request->email)->sum('points');
    
        return view('loyalty.index', compact('totalPoints'));
    }
    

 
    public function redeemPoints(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'reward_id' => 'required|exists:rewards,id',
        ]);

        $totalPoints = LoyaltyPoint::where('email', $request->email)->sum('points');
        $reward = Reward::find($request->reward_id);

        if ($totalPoints < $reward->points_required) {
            return redirect()->back()->with('error', 'Niet genoeg punten!');
        }

        LoyaltyPoint::create([
            'email' => $request->email,
            'points' => -$reward->points_required, 
        ]);

        return redirect()->back()->with('success', "Je hebt {$reward->name} ingewisseld!");
    }
}
