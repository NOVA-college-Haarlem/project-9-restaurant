<?php

namespace App\Http\Controllers;

use App\Models\MenuItem;
use Illuminate\Http\Request;

class MenuItemController extends Controller
{
    public function index()
    {
        $menuItems = MenuItem::orderBy('popularity', 'desc')->get();
        return view('menu.index', compact('menuItems'));
    }

    public function create()
    {
        return view('menu.create');
    }

    public function store(Request $request)
    {
        // Valideer de velden
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'prijs' => 'required|numeric',  // Verplicht veld
            'calories' => 'required|integer',
            'protein' => 'required|numeric',
            'carbs' => 'required|numeric',
            'fat' => 'required|numeric',
            'allergens' => 'nullable|string',
            'cost' => 'nullable|numeric',
        ]);
    
        // Zet de checkbox velden naar een expliciete true/false waarde
        $data['vegetarian'] = $request->has('vegetarian') ? true : false;
        $data['vegan'] = $request->has('vegan') ? true : false;
        $data['gluten_free'] = $request->has('gluten_free') ? true : false;
    
        // Voeg het menu-item toe
        MenuItem::create($data);
    
        return redirect()->route('menu-items.index')->with('success', 'Menu-item toegevoegd!');
    }
    
    

    public function edit($id)
    {
        $menuItem = MenuItem::findOrFail($id);
        return view('menu.edit', compact('menuItem'));
    }

    public function update(Request $request, $id)
    {
        $menuItem = MenuItem::findOrFail($id);

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'cost' => 'required|numeric',
            'calories' => 'nullable|integer',
            'protein' => 'nullable|numeric',
            'carbs' => 'nullable|numeric',
            'fat' => 'nullable|numeric',
            'allergens' => 'nullable|string',
            'vegetarian' => 'boolean',
            'vegan' => 'boolean',
            'gluten_free' => 'boolean',
        ]);

        $menuItem->update($data);
        return redirect()->route('menu-items.index')->with('success', 'Menu-item bijgewerkt!');
    }

    public function destroy($id)
    {
        $menuItem = MenuItem::findOrFail($id);
        $menuItem->delete();
        return redirect()->route('menu.index')->with('success', 'Menu-item verwijderd');
    }

    public function filterForm()
    {
        return view('menu.filter');
    }

    // To handle filtering logic
    public function filter(Request $request)
    {
     
        $query = MenuItem::query();
    
        // Filtering dieetvoorkeuren
        if ($request->has('vegetarian') && $request->vegetarian == 1) {
            $query->where('vegetarian', true);
        }
    
        if ($request->has('vegan') && $request->vegan == 1) {
            $query->where('vegan', true);
        }
    
        if ($request->has('gluten_free') && $request->gluten_free == 1) {
            $query->where('gluten_free', true);
        }
    
        // Max calorieën
        if ($request->filled('max_calories')) {
            $query->where('calories', '<=', $request->max_calories);
        }
    
        // Allergenen uitsluiten
        if ($request->filled('exclude_allergen')) {
            $query->whereNotIn('allergens', [$request->exclude_allergen]);
        }
    
        // Sorteren op voedingswaarden of prijs
        if ($request->filled('sort_by')) {
            $query->orderBy($request->sort_by, 'asc');
        }
    
        $menuItems = $query->get();
    
        return view('menu.index', compact('menuItems'));
    }
    

    public function show($id)
    {
        $menuItem = MenuItem::findOrFail($id);
        return view('menu.show', compact('menuItem'));
    }
    public function display()
    {
        $menuItems = MenuItem::all();
        return view('menu.menu_display', compact('menuItems')); // Zorg dat het pad klopt
    }
    
    

}
