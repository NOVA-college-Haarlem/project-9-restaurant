<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function create()
    {
        return view('feedback.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_name' => 'required|string|max:255',
            'user_email' => 'required|email|max:255',
            'rating' => 'required|integer|min:1|max:10',
            'food_comment' => 'nullable|string',
            'service_comment' => 'nullable|string',
            'ambiance_comment' => 'nullable|string',
            'photo' => 'nullable|image|max:2048',
            'is_public' => 'boolean',
        ]);

        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('feedback-photos', 'public');
        }

        Feedback::create([
            'user_name' => $validated['user_name'],
            'user_email' => $validated['user_email'],
            'rating' => $validated['rating'],
            'food_comment' => $validated['food_comment'],
            'service_comment' => $validated['service_comment'],
            'ambiance_comment' => $validated['ambiance_comment'],
            'photo_path' => $photoPath,
            'is_public' => $validated['is_public'] ?? true,
        ]);

        return redirect()->route('feedback.index')->with('success', 'Bedankt voor je feedback!');
    }

    // Pas de index methode aan om user_name te gebruiken in plaats van user relatie
    public function index(Request $request)
    {
        $query = Feedback::latest();

        if ($request->has('filter')) {
            if ($request->filter === 'high') {
                $query->where('rating', '>', 6);
            } elseif ($request->filter === 'low') {
                $query->where('rating', '<=', 6);
            }
        }

        $feedback = $query->paginate(10);

        return view('feedback.index', compact('feedback'));
    }


    public function show(Feedback $feedback)
    {
        return view('feedback.show', compact('feedback'));
    }

    public function storeResponse(Request $request, Feedback $feedback)
    {
        $request->validate([
            'admin_response' => 'required|string',
        ]);

        $feedback->update([
            'admin_response' => $request->admin_response,
        ]);

        return back()->with('success', 'Reactie opgeslagen!');
    }
}
