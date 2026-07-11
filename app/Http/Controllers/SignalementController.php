<?php
namespace App\Http\Controllers;
use App\Models\Signalement;
use Illuminate\Http\Request;

class SignalementController extends Controller
{
    public function create() { return view('signalements.create'); }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'titre' => 'required|max:255',
            'description' => 'required',
            'quartier' => 'nullable|string',
            'photo' => 'nullable|image|max:2048',
        ]);
        $validated['statut'] = 'En cours';
        if($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('signalements', 'public');
        }
        Signalement::create($validated);
        return redirect()->route('home')->with('success', 'Merci, votre signalement est enregistré.');
    }
}
