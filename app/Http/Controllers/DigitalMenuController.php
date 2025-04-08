<?php

namespace App\Http\Controllers;

use App\Models\DigitalMenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DigitalMenuController extends Controller
{
    public function index()
    {
        $menus = DigitalMenu::all();
        return view('digital-menus.index', compact('menus'));
    }

    public function create()
    {
        return view('digital-menus.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'nullable',
            'price' => 'required|numeric',
            'image' => 'nullable|image|max:2048',
            'category' => 'required',
            'dietary_preferences' => 'nullable',
            'allergens' => 'nullable',
            'nutritional_info' => 'nullable',
            'is_special_offer' => 'boolean',
            'schedule_start' => 'nullable|date',
            'schedule_end' => 'nullable|date|after:schedule_start',
            'layout_type' => 'required'
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('digital-menus', 'public');
            $validated['image_path'] = $path;
        }

        DigitalMenu::create($validated);

        return redirect()->route('digital-menus.index');
    }

    public function edit($id)
    {
        $menu = DigitalMenu::findOrFail($id);
        return view('digital-menus.edit', compact('menu'));
    }

    public function update(Request $request, $id)
    {
        $menu = DigitalMenu::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'nullable',
            'price' => 'required|numeric',
            'image' => 'nullable|image|max:2048',
            'category' => 'required',
            'dietary_preferences' => 'nullable',
            'allergens' => 'nullable',
            'nutritional_info' => 'nullable',
            'is_special_offer' => 'boolean',
            'schedule_start' => 'nullable|date',
            'schedule_end' => 'nullable|date|after:schedule_start',
            'layout_type' => 'required'
        ]);

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($menu->image_path);
            $path = $request->file('image')->store('digital-menus', 'public');
            $validated['image_path'] = $path;
        }

        $menu->update($validated);

        return redirect()->route('digital-menus.index');
    }

    public function destroy($id)
    {
        $menu = DigitalMenu::findOrFail($id);
        Storage::disk('public')->delete($menu->image_path);
        $menu->delete();

        return redirect()->route('digital-menus.index');
    }
}
