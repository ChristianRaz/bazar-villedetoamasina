<?php
namespace App\Http\Controllers;

use App\Models\Actualite;

class ActualiteController extends Controller
{
    public function index()
    {
        $actualites = Actualite::latest('date_publication')->paginate(9);
        return view('actualites.index', compact('actualites'));
    }

    public function show($slug)
    {
        $actualite = Actualite::where('slug', $slug)->firstOrFail();
        return view('actualites.show', compact('actualite'));
    }
}
