<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Projet;

class ProjetController extends Controller
{
    //
    public function index()
{
    $projets = Projet::latest('created_at')->paginate(9);
    return view('projets.index', compact('projets'));
}

public function show(Projet $projet)
{
    return view('projets.show', compact('projet'));
}
}
