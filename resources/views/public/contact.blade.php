<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Contact - Commune Urbaine de Toamasina</title>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&family=Inter:wght@300;400;500;600&family=Space+Mono:wght@400;700&display=swap" rel="stylesheet">
<style>
:root {
  --ocean: #0a2540;
  --gold: #e8a020;
  --blanc: #f8f8f4;
  --sable: #f0ebe0;
}
body {
  font-family: 'Inter', sans-serif;
  background: var(--sable);
  color: var(--ocean);
  margin: 0;
  padding: 0;
}
nav {
  position: fixed; top: 0; left: 0; right: 0; z-index: 100;
  background: rgba(10,37,64,0.97);
  backdrop-filter: blur(10px);
  display: flex; align-items: center; justify-content: space-between;
  padding: 0 5%;
  height: 68px;
  border-bottom: 1px solid rgba(33,150,176,0.3);
}
.nav-logo {
  display: flex; align-items: center; gap: 12px;
  text-decoration: none;
}
.nav-logo img {
  height: 40px; width: 40px;
  border-radius: 50%;
  border: 2px solid var(--gold);
  object-fit: cover;
}
.nav-logo-text {
  font-family: 'Space Mono', monospace;
  font-size: 11px; font-weight: 700;
  color: var(--blanc);
  letter-spacing: 1.5px;
  text-transform: uppercase;
  line-height: 1.3;
}
.nav-logo-text span { color: var(--gold); display: block; }
.nav-links a {
  color: rgba(248,248,244,0.7);
  text-decoration: none;
  font-size: 13px; font-weight: 500;
  margin-left: 32px;
  text-transform: uppercase;
}
.nav-links a:hover { color: var(--gold); }

.container {
  max-width: 800px;
  margin: 120px auto;
  padding: 0 5%;
}
h1 {
  font-family: 'Playfair Display', serif;
  font-size: 42px;
  color: var(--ocean);
  margin-bottom: 20px;
}
.contact-card {
  background: white;
  padding: 40px;
  border-radius: 8px;
  box-shadow: 0 2px 16px rgba(10,37,64,0.08);
}
.contact-info {
  margin-top: 30px;
  line-height: 1.8;
}
</style>
</head>
<body>

<nav>
  <a class="nav-logo" href="{{ route('home') }}">
    <img src="{{ asset('assets/comm.jpg') }}" alt="Logo CUT">
    <div class="nav-logo-text">
      Commune Urbaine
      <span>de Toamasina</span>
    </div>
  </a>
  <div class="nav-links">
    <a href="{{ route('home') }}#directions">Directions</a>
    <a href="{{ route('home') }}#projets">Projets</a>
    <a href="{{ route('contact') }}">Contact</a>
  </div>
</nav>

<div class="container">
  <h1>Contactez-nous</h1>
  <div class="contact-card">
    <p>Pour toute question ou demande d'information, contactez la Commune Urbaine de Toamasina.</p>

    <div class="contact-info">
      <strong>📍 Adresse :</strong> Hôtel de Ville, Toamasina, Madagascar<br>
      <strong>📞 Téléphone :</strong> +261 XX XXX XX<br>
      <strong>✉️ Email :</strong> contact@villedetoamasina.mg<br>
      <strong>🕐 Horaires :</strong> Lundi - Vendredi : 8h - 16h
    </div>
  </div>
</div>

</body>
</html>
