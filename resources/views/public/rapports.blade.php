@extends('layouts.app')

@section('content')
<h2>Rapports hebdomadaires</h2>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<form action="{{ route('rapports.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <select name="direction_id" required>
        @foreach($directions as $d)
            <option value="{{ $d->id }}">{{ $d->nom }}</option>
        @endforeach
    </select>

    <select name="periode" required>
        <option value="jour">Journalier</option>
        <option value="semaine">Hebdomadaire</option>
        <option value="mois">Mensuel</option>
    </select>

    <input type="date" name="date_rapport" required>
    <input type="number" step="0.01" name="montant" placeholder="Montant" required>
    <input type="file" name="fichier_pdf" accept=".pdf" required>
    <textarea name="commentaire" placeholder="Commentaire"></textarea>

    <button type="submit">Envoyer</button>
</form>

<hr>
<h3>Derniers rapports</h3>
@foreach($rapports as $r)
    <p>{{ $r->direction->nom }} - {{ $r->date_rapport }} - {{ $r->montant }} Ar
    <a href="{{ Storage::url($r->fichier_pdf) }}" target="_blank">PDF</a></p>
@endforeach
@endsection
