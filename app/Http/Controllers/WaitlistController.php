<?php
namespace App\Http\Controllers;

use App\Models\Waitlist;
use Illuminate\Http\Request;
use App\Models\User;

class WaitlistController extends Controller
{
    // Toon de wachtlijst
    public function index()
    {
        $waitlists = Waitlist::with('user')->get(); // Haalt de wachtlijst en de bijbehorende gebruiker op
        $users = User::all(); // Haalt ALLE gebruikers op, ongeacht de rol
        return view('waitlist.index', compact('waitlists', 'users'));
    }
    
    // Voeg klant toe aan de wachtlijst
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id', // Zorg ervoor dat de user_id geldig is
            'party_size' => 'required|integer|min:1',
            'estimated_wait_time' => 'required|integer|min:1',
        ]);
    
        // Voeg de klant toe aan de wachtlijst met de juiste user_id
        Waitlist::create([
            'user_id' => $request->user_id,
            'party_size' => $request->party_size,
            'estimated_wait_time' => $request->estimated_wait_time,
        ]);
    
        return redirect()->route('waitlist.index')->with('success', 'Klant toegevoegd aan de wachtlijst!');
    }
    

    // Verwijder klant uit de wachtlijst
    public function destroy($id)
    {
        $waitlist = Waitlist::findOrFail($id);
        $waitlist->delete();

        return redirect()->route('waitlist.index')->with('success', 'Klant verwijderd van de wachtlijst!');
    }

    // Notificeer klant dat tafel klaar is
    public function notify($id)
    {
        $waitlist = Waitlist::findOrFail($id);
        $waitlist->update(['notified' => true]);

        // Logica voor het sturen van een notificatie kan hier worden toegevoegd, bijvoorbeeld een email

        return redirect()->route('waitlist.index')->with('success', 'Klant is geïnformeerd dat hun tafel klaar is!');
    }
    // Klant voegt zichzelf toe aan de wachtlijst
    public function join(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'party_size' => 'required|integer|min:1',
        ]);

        // Controleer of de gebruiker al in de wachtlijst staat
        if (Waitlist::where('user_id', $request->user_id)->exists()) {
            return redirect()->back()->with('error', 'Je staat al op de wachtlijst!');
        }

        // Schatting wachttijd = 10 min per groep die voor je staat
        $queuePosition = Waitlist::count();
        $estimatedWaitTime = $queuePosition * 10; 

        Waitlist::create([
            'user_id' => $request->user_id,
            'party_size' => $request->party_size,
            'estimated_wait_time' => $estimatedWaitTime,
        ]);

        return redirect()->route('waitlist.status', ['user_id' => $request->user_id])->with('success', 'Je bent toegevoegd aan de wachtlijst!');
    }

    // Klant bekijkt zijn status in de wachtlijst
    public function status($user_id)
    {
        $entry = Waitlist::where('user_id', $user_id)->first();

        if (!$entry) {
            return redirect()->back()->with('error', 'Je staat niet op de wachtlijst.');
        }

        // Bepaal positie in de wachtrij
        $position = Waitlist::where('id', '<', $entry->id)->count() + 1;

        return view('waitlist.status', compact('entry', 'position'));
    }

    // Klant verwijdert zichzelf uit de wachtlijst
    public function leave(Request $request)
    {
        $request->validate(['user_id' => 'required|exists:users,id']);

        $entry = Waitlist::where('user_id', $request->user_id)->first();

        if (!$entry) {
            return redirect()->back()->with('error', 'Je staat niet op de wachtlijst.');
        }

        $entry->delete();

        return redirect()->route('waitlist.join')->with('success', 'Je bent van de wachtlijst verwijderd.');
    }
    public function showJoinForm()
{
    return view('waitlist.join'); // Zorg dat je een blade-template hebt: resources/views/waitlist/join.blade.php
}
}

