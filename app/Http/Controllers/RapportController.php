<?php
namespace App\Http\Controllers;

use App\Models\Rapport;
use App\Models\Direction;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RapportController extends Controller
{
    public function index()
    {
        $directions = Direction::orderBy('nom')->get();
        $rapports = Rapport::with('direction')->latest()->take(10)->get();
        return view('public.rapports', compact('directions','rapports'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'direction_id' => 'required|exists:directions,id',
            'periode' => 'required|in:jour,semaine,mois', // <-- 'jour' au lieu de 'journalier'
            'date_rapport' => 'required|date',
            'montant' => 'required|numeric|min:0',
            'fichier_pdf' => 'required|mimes:pdf|max:2048',
            'commentaire' => 'nullable|string|max:1000'
        ]);

        $pdfPath = $request->file('fichier_pdf')->store('rapports', 'public');

        Rapport::create([
            'direction_id' => $request->direction_id,
            'periode' => $request->periode,
            'date_rapport' => $request->date_rapport,
            'montant' => $request->montant,
            'fichier_pdf' => $pdfPath,
            'commentaire' => $request->commentaire
        ]);

        return back()->with('success', 'Rapport envoyé avec succès ✅');
    }

    public function show(Rapport $rapport)
    {
        return view('public.rapports.show', compact('rapport'));
    }
}
