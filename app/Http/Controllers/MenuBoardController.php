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

        $items = DigitalMenu::where('layout_type', $selectedLayout)
            ->where(function ($query) use ($now) {
                $query->whereNull('schedule_start')
                    ->orWhere('schedule_start', '<=', $now);
            })
            ->where(function ($query) use ($now) {
                $query->whereNull('schedule_end')
                    ->orWhere('schedule_end', '>=', $now);
            })
            ->get();

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
