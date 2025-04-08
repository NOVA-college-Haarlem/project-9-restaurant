<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use App\Models\IngredientOrder;
use Illuminate\Http\Request;

class IngredientOrderController extends Controller
{
    public function index()
    {
        $orders = IngredientOrder::latest()->get();
        return view('ingredient_orders.index', compact('orders'));
    }

    public function create()
    {
        return view('ingredient_orders.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'ingredient_name' => 'required|string|max:255',
            'quantity' => 'required|integer|min:1',
            'supplier' => 'required|string|max:255',
        ]);

        IngredientOrder::create([
            'ingredient_name' => $request->ingredient_name,
            'quantity' => $request->quantity,
            'supplier' => $request->supplier,
            'status' => 'pending',
        ]);

        return redirect()->route('ingredient-orders.index')->with('success', 'Bestelling aangemaakt.');
    }

    public function show(IngredientOrder $ingredientOrder)
    {
        return view('ingredient_orders.show', compact('ingredientOrder'));
    }

    public function edit(IngredientOrder $ingredientOrder)
    {
        return view('ingredient_orders.edit', compact('ingredientOrder'));
    }

    public function update(Request $request, IngredientOrder $ingredientOrder)
    {
        $request->validate([
            'status' => 'required|string',
            'delivery_date' => 'nullable|date',
            'received_quantity' => 'nullable|integer|min:0',
        ]);

        $ingredientOrder->update($request->only(['status', 'delivery_date', 'received_quantity']));

        return redirect()->route('ingredient-orders.show', $ingredientOrder)->with('success', 'Bestelling bijgewerkt.');
    }
}
