<?php

namespace App\Http\Controllers;

use App\Models\DigitalMenu;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MenuBoardController extends Controller
{
    public function index(Request $request)
    {
        $now = Carbon::now();
        $selectedLayout = $request->input('layout', 'main'); // Get layout from request or default to 'main'

        $items = DigitalMenu::all();
        $categories = DigitalMenu::distinct()->pluck('category');

        return view('menu-board.index', [
            'items' => $items,
            'categories' => $categories,
            'selectedLayout' => $selectedLayout // Pass this to the view
        ]);
    }

    public function show($id)
    {
        $item = DigitalMenu::findOrFail($id);
        return view('menu-board.show', compact('item'));
    }
}
