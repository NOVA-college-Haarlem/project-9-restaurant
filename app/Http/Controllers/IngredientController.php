<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use App\Models\IngredientUsage;
use Illuminate\Http\Request;

class IngredientController extends Controller
{
    public function index()
    {
        $ingredients = Ingredient::all();
        $lowStockIngredients = $ingredients->filter(function ($ingredient) {
            return $ingredient->stock_quantity <= $ingredient->low_stock_threshold;
        });

        return view('ingredients.index', compact('ingredients', 'lowStockIngredients'));
    }

    public function create()
    {
        return view('ingredients.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'category' => 'nullable|string',
            'stock_quantity' => 'required|integer',
            'low_stock_threshold' => 'required|integer',
        ]);

        Ingredient::create($request->all());

        return redirect()->route('ingredients.index')->with('success', 'Ingrediënt toegevoegd!');
    }

    public function edit(Ingredient $ingredient)
    {
        return view('ingredients.edit', compact('ingredient'));
    }

    public function update(Request $request, Ingredient $ingredient)
    {
        $request->validate([
            'name' => 'required|string',
            'category' => 'nullable|string',
            'stock_quantity' => 'required|integer',
            'low_stock_threshold' => 'required|integer',
        ]);

        $ingredient->update($request->all());

        return redirect()->route('ingredients.index')->with('success', 'Ingrediënt bijgewerkt!');
    }

    public function usageHistory(Ingredient $ingredient)
    {
        $usages = $ingredient->usages()->latest()->get();
        return view('ingredients.usage-history', compact('ingredient', 'usages'));
    }

    public function reduceStock(Request $request, Ingredient $ingredient)
    {
        $request->validate([
            'amount_used' => 'required|integer|min:1',
        ]);

        $ingredient->stock_quantity -= $request->amount_used;
        $ingredient->save();

        IngredientUsage::create([
            'ingredient_id' => $ingredient->id,
            'amount_used' => $request->amount_used,
        ]);

        return back()->with('success', 'Voorraad bijgewerkt.');
    }
}
