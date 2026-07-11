<?php

namespace App\Http\Controllers;

use App\Models\PageAccueil;
use App\Models\Direction;
use App\Models\Projet;
use App\Models\Actualite;
use App\Models\Signalement;

class PublicController extends Controller
{
    public function index()
    {
        $pageAccueil = PageAccueil::first(); // On prend le premier enregistrement
        $directions = Direction::orderBy('nom')->get();
        $projetsSemaine = Projet::latest()->take(10)->get();
        $actualitesRecentes = Actualite::latest('date_publication')->take(3)->get();
        $signalementsRecentes = \App\Models\Signalement::latest()->take(3)->get(); // signalements

        return view('public.home', compact('pageAccueil', 'directions', 'projetsSemaine', 'actualitesRecentes','signalementsRecentes'));
    }

    public function directions()
    {
        $directions = Direction::orderBy('nom')->get();
        return view('public.directions', compact('directions'));
    }



    public function showDirection(Direction $direction)
    {
        return view('public.directions.show', compact('direction'));
    }
}
