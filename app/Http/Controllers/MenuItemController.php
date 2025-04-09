<?php

namespace App\Http\Controllers;

use App\Models\MenuItem;
use Illuminate\Http\Request;

class MenuItemController extends Controller
{
    /**
     * Display a listing of the resource (alle menu items).
     */
    public function index()
    {
        $menuItems = MenuItem::all();
        return view('menu.index', compact('menuItems'));
    }

    /**
     * Show the form for creating a new menu item.
     */
    public function create()
    {
        return view('menu_items.create'); // Zorg ervoor dat je een view hebt voor het maken van een menu-item
    }

    /**
     * Store a newly created menu item in storage.
     */
    public function store(Request $request)
    {
        // Valideer de gegevens
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'category' => 'required|string', // Bijvoorbeeld 'Main', 'Dessert', etc.
        ]);

        // Maak een nieuw menu-item aan
        MenuItem::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'category' => $request->category,
        ]);

        // Redirect naar de index-pagina van menu-items
        return redirect()->route('menu-items.index')->with('success', 'Menu item succesvol toegevoegd!');
    }

    /**
     * Display the specified resource (menu item details).
     */
    public function show(MenuItem $menuItem)
    {
        return view('menu_items.show', compact('menuItem'));
    }

    /**
     * Show the form for editing the specified menu item.
     */
    public function edit(MenuItem $menuItem)
    {
        return view('menu_items.edit', compact('menuItem'));
    }

    /**
     * Update the specified menu item in storage.
     */
    public function update(Request $request, MenuItem $menuItem)
    {
        // Valideer de gegevens
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'category' => 'required|string',
        ]);

        // Werk het menu-item bij
        $menuItem->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'category' => $request->category,
        ]);

        // Redirect naar de index-pagina van menu-items
        return redirect()->route('menu-items.index')->with('success', 'Menu item succesvol bijgewerkt!');
    }

    /**
     * Remove the specified menu item from storage.
     */
    public function destroy(MenuItem $menuItem)
    {
        $menuItem->delete();
        return redirect()->route('menu-items.index')->with('success', 'Menu item succesvol verwijderd!');
    }
    public function menuBoard()
    {
        $items = MenuItem::all();
        $categories = MenuItem::distinct()->pluck('category');
        return view('menu-board.index', compact('items', 'categories'));
    }
}
