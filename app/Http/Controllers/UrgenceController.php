<?php
namespace App\Http\Controllers;

use App\Models\Urgence;
use Illuminate\Http\Request;

class UrgenceController extends Controller
{
    public function create()
    {
        return view('urgences.create'); // <- La page formulaire
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'titre' => 'required|max:255',
            'description' => 'required',
            'quartier' => 'nullable|string',
            'photo' => 'nullable|image|max:2048',
        ]);

        $validated['statut'] = 'En cours';
        $validated['items'] = json_encode([]); // <- 1. PATCH ICI : On remplit la colonne NOT NULL avec tableau vide

        if($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('urgences', 'public');
        }

        Urgence::create($validated); // <- 2. Utilise $validated, pas $request->all()

        return redirect()->route('home')->with('success', 'Merci, votre signalement est enregistré.');
    }

    public function show(Urgence $urgence)
    {
        return view('urgences.show', compact('urgence'));
    }
}
