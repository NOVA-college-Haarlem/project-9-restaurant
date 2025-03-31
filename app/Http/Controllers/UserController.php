<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Toon het formulier
    public function create()
    {
        return view('users.create');
    }

    // Verwerk de invoer en sla de gebruiker op
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'role' => 'required|in:customer,staff,admin'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        return redirect()->route('users.create')->with('success', 'Gebruiker succesvol aangemaakt!');
    }

    public function index(Request $request)
    {
        $role = $request->query('role'); // Haal de filter op uit de URL

        $users = User::when($role, function ($query, $role) {
            return $query->where('role', $role);
        })->get();

        return view('users.index', compact('users', 'role'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'role' => 'required|in:customer,staff,admin',
        ]));

        return redirect()->route('users.index')->with('success', 'Gebruiker bijgewerkt!');
    }
    
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'Gebruiker verwijderd!');
    }
}
