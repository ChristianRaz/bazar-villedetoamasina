@php use Illuminate\Support\Str; @endphp
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Signaler une urgence | CUT</title>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&family=Inter:wght@300;400;500;600&family=Space+Mono:wght@400;700&display=swap" rel="stylesheet">
<style>
:root {
  --ocean:   #0a2540;
  --ocean2:  #1a4a6e;
  --wave:    #2196b0;
  --gold:    #e8a020;
  --gold2:   #f5c842;
  --blanc:   #f8f8f4;
  --gris:    #8a9bb0;
  --sable:   #f0ebe0;
  --rouge:   #c0392b;
  --vert:    #27ae60;
}
body { font-family: 'Inter', sans-serif; background: var(--sable); color: var(--ocean); margin:0; }
nav { position: fixed; top: 0; left: 0; right: 0; z-index: 100; background: rgba(10,37,64,0.97); backdrop-filter: blur(10px); display: flex; align-items: center; justify-content: space-between; padding: 0 5%; height: 68px; border-bottom: 1px solid rgba(33,150,176,0.3); }
.nav-logo-text { font-family: 'Space Mono', monospace; font-size: 11px; font-weight: 700; color: var(--blanc); letter-spacing: 1.5px; text-transform: uppercase; }
.nav-logo-text span { color: var(--gold); display: block; }
.btn-hero-primary { background: var(--gold); color: var(--ocean); padding: 14px 30px; border-radius: 4px; font-weight: 700; font-size: 14px; text-decoration: none; border:none; cursor:pointer; letter-spacing: .5px; }
.btn-hero-primary:hover { background: var(--gold2); }
label { display:block; font-weight:600; font-size:13px; margin-bottom:6px; color:var(--ocean); }
input, textarea { font-family: 'Inter', sans-serif; }
</style>
</head>
<body>

<nav>
  <a class="nav-logo-text" href="{{ route('home') }}">
    Commune Urbaine
    <span>de Toamasina</span>
  </a>
  <a href="{{ route('home') }}" style="color:var(--blanc); text-decoration:none; font-size:13px;">← Retour Accueil</a>
</nav>

<section style="padding:120px 5% 80px; background:var(--sable);">
  <div style="max-width:600px; margin:0 auto; background:white; padding:40px; border-radius:12px; box-shadow: 0 8px 32px rgba(10,37,64,0.1);">
    <div class="section-eyebrow" style="font-family: 'Space Mono', monospace; font-size: 10px; letter-spacing: 3px; color: var(--wave); text-transform: uppercase; margin-bottom: 10px;">Citoyens</div>
    <h1 style="font-family: 'Playfair Display', serif; color:var(--ocean); margin-bottom:20px; font-size:32px;">Signaler une <span style="color:var(--gold)">urgence</span></h1>

    @if(session('success'))
      <div style="background:#e8f7ee; color:var(--vert); padding:12px; border-radius:6px; margin-bottom:20px; border-left:3px solid var(--vert);">
        {{ session('success') }}
      </div>
    @endif
    @if($errors->any())
      <div style="background:#fee; color:#c00; padding:12px; border-radius:6px; margin-bottom:20px; border-left:3px solid var(--rouge);">
        @foreach($errors->all() as $error) {{ $error }} <br> @endforeach
      </div>
    @endif

    <form action="{{ route('signalements.store') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div style="margin-bottom:16px;">
        <label>Titre du problème *</label>
        <input type="text" name="titre" value="{{ old('titre') }}" required style="width:100%; padding:12px; border:1px solid #ccc; border-radius:6px;">
      </div>
      <div style="margin-bottom:16px;">
        <label>Quartier</label>
        <input type="text" name="quartier" value="{{ old('quartier') }}" placeholder="Ex: Mangarivotra" style="width:100%; padding:12px; border:1px solid #ccc; border-radius:6px;">
      </div>
      <div style="margin-bottom:16px;">
        <label>Description *</label>
        <textarea name="description" rows="4" required style="width:100%; padding:12px; border:1px solid #ccc; border-radius:6px;">{{ old('description') }}</textarea>
      </div>
      <div style="margin-bottom:20px;">
        <label>Photo</label>
        <input type="file" name="photo" accept="image/*" style="width:100%;">
      </div>
      <button type="submit" class="btn-hero-primary">Envoyer le signalement →</button>
    </form>
  </div>
</section>

</body>
</html>
