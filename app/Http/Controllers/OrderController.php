<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\MenuItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function showMenu()
    {
        $menuItems = MenuItem::all();
        return view('orders.menu', compact('menuItems'));
    }

    public function create()
    {
        $menuItems = MenuItem::all();
        return view('orders.create', compact('menuItems'));
    }

    
public function placeOrder(Request $request)
{
    $request->validate([
        'menu_items' => 'required|array',
        'menu_items.*.id' => 'required|exists:menu_items,id',
        'menu_items.*.quantity' => 'required|integer|min:1',
        'delivery_type' => 'required|in:delivery,pickup',
    ]);

    $user_id = Auth::check() ? Auth::user()->id : null;

    $order = Order::create([
        'user_id' => $user_id,
        'status' => 'pending',
        'delivery_type' => $request->delivery_type,
        'total_price' => 0, // Wordt later berekend
    ]);

    foreach ($request->menu_items as $menuItem) {
        $order->orderItems()->create([
            'menu_item_id' => $menuItem['id'],
            'quantity' => $menuItem['quantity'],
        ]);
    }

    $order->load('orderItems.menuItem');
    $totalPrice = $order->orderItems->sum(function ($item) {
        return $item->menuItem->price * $item->quantity;
    });

    $order->update(['total_price' => $totalPrice]);

    return redirect()->route('payment.page')->with('success', 'Bestelling succesvol geplaatst! Ga verder met je betaling.');
}

    public function index()
    {
        $orders = Order::all();
        return view('orders.index', compact('orders'));
    }

    public function updateStatus(Order $order, Request $request)
    {
        $request->validate([
            'status' => 'required|in:accepted,rejected,completed',
        ]);

        $order->update(['status' => $request->status]);

        return redirect()->route('orders.index')->with('success', 'Orderstatus bijgewerkt!');
    }
}
