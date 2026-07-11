<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>{{ $direction->nom }} - Commune Toamasina</title>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Inter:wght@400;500&display=swap" rel="stylesheet">
<style>
body { font-family: Inter; background: #f0ebe0; color: #0a2540; margin: 0; padding: 80px 5%; }
.container { max-width: 900px; margin: 0 auto; background: white; padding: 40px; border-radius: 8px; }
h1 { font-family: Playfair Display; font-size: 42px; margin-bottom: 20px; }
img { width: 100%; border-radius: 8px; margin: 20px 0; }
.back { color: #2196b0; text-decoration: none; display: inline-block; margin-bottom: 20px; }
</style>
</head>
<body>
<a href="{{ route('home') }}#directions" class="back">← Retour aux directions</a>
<div class="container">
  <h1>{{ $direction->nom }}</h1>
  @if($direction->image)
    <img src="{{ Storage::url($direction->image) }}" alt="{{ $direction->nom }}">
  @endif
  <p style="line-height: 1.7; font-size: 16px;">{{ $direction->description }}</p>
</div>
</body>
</html>
