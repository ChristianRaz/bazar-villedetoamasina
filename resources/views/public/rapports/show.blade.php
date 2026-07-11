<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Rapport - {{ $rapport->direction->nom }}</title>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Inter:wght@400;600&display=swap" rel="stylesheet">
<style>
:root { --ocean:#0a2540; --gold:#e8a020; --sable:#f0ebe0; --blanc:#f8f8f4; }
body { font-family:Inter; background:var(--sable); color:var(--ocean); margin:0; padding:100px 5%; }
.container { max-width:800px; margin:0 auto; }
.card { background:white; padding:40px; border-radius:12px; box-shadow:0 4px 20px rgba(10,37,64,0.1); }
h1 { font-family:Playfair Display; font-size:32px; margin-bottom:30px; }
.info-grid { display:grid; grid-template-columns:1fr 1fr; gap:30px; margin-bottom:30px; }
.label { font-size:12px; color:#8a9bb0; text-transform:uppercase; letter-spacing:1px; margin-bottom:4px; }
.value { font-size:18px; font-weight:600; color:var(--ocean); }
.montant { font-size:36px; font-weight:700; color:var(--gold); }
.badge { display:inline-block; background:var(--ocean); color:var(--blanc); padding:6px 12px; border-radius:4px; font-size:12px; text-transform:capitalize; }
.pdf-box { background:var(--sable); padding:20px; border-radius:8px; text-align:center; margin:30px 0; }
.pdf-btn { display:inline-block; background:var(--gold); color:var(--ocean); padding:14px 30px; border-radius:6px; text-decoration:none; font-weight:700; }
.pdf-btn:hover { background:#f5c842; }
.commentaire { background:#f8f9fa; padding:20px; border-left:4px solid var(--gold); border-radius:4px; margin-top:20px; }
.back { display:inline-block; margin-bottom:20px; color:#2196b0; text-decoration:none; }
</style>
</head>
<body>
<a href="{{ route('rapports.index') }}" class="back">← Tous les rapports</a>

<div class="container">
  <div class="card">
    <h1>Rapport {{ ucfirst($rapport->periode) }}</h1>

    <div class="info-grid">
      <div>
        <div class="label">Direction</div>
        <div class="value">{{ $rapport->direction->nom }}</div>
      </div>
      <div>
        <div class="label">Période</div>
        <div class="value"><span class="badge">{{ $rapport->periode }}</span></div>
      </div>

      <div>
        <div class="label">Date début</div>
        <div class="value">{{ \Carbon\Carbon::parse($rapport->date_debut)->format('d/m/Y') }}</div>
      </div>
      <div>
        <div class="label">Date fin</div>
        <div class="value">{{ \Carbon\Carbon::parse($rapport->date_fin)->format('d/m/Y') }}</div>
      </div>
    </div>

    <div style="margin-bottom:30px;">
      <div class="label">Montant total récupéré</div>
      <div class="montant">{{ number_format($rapport->montant_total, 0, ',', ' ') }} Ar</div>
    </div>

    <div class="pdf-box">
      <div class="label" style="margin-bottom:12px;">Rapport PDF</div>
      <a href="{{ Storage::url($rapport->fichier_pdf) }}" target="_blank" class="pdf-btn">📄 Ouvrir le PDF</a>
    </div>

    @if($rapport->commentaire)
    <div>
      <div class="label">Commentaire</div>
      <div class="commentaire">{{ $rapport->commentaire }}</div>
    </div>
    @endif

    <div style="margin-top:30px; font-size:12px; color:#8a9bb0;">
      Envoyé le {{ $rapport->created_at->format('d/m/Y à H:i') }}
    </div>
  </div>
</div>
</body>
</html>
