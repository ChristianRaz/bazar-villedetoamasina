@php use Illuminate\Support\Str; @endphp

<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Commune Urbaine de Toamasina</title>
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

* { box-sizing: border-box; margin: 0; padding: 0; }
html { scroll-behavior: smooth; }

body {
  font-family: 'Inter', sans-serif;
  background: var(--blanc);
  color: var(--ocean);
  overflow-x: hidden;
}

/* ── NAVBAR ── */
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

.nav-links { display: flex; gap: 32px; align-items: center; }
.nav-links a {
  color: rgba(248,248,244,0.7);
  text-decoration: none;
  font-size: 13px; font-weight: 500;
  letter-spacing: .5px;
  transition: color .2s;
  text-transform: uppercase;
}
.nav-links a:hover { color: var(--gold); }
.nav-cta {
  background: var(--gold) !important;
  color: var(--ocean) !important;
  padding: 8px 20px;
  border-radius: 4px;
  font-weight: 700 !important;
}

/* ── HERO ── */
.hero {
  min-height: 100vh;
  /* background: linear-gradient(160deg, var(--ocean) 0%, var(--ocean2) 50%, #0d3d5a 100%); */
  background:
        linear-gradient(135deg, rgba(10,37,64,0.85) 0%, rgba(26,74,110,0.75) 100%),
        url('{{ asset('assets/comm.jpg') }}');

  position: relative;
  display: flex; align-items: center;
  padding: 100px 5% 60px;
  overflow: hidden;
}

.hero-bg {
  position: absolute; inset: 0;
  background-image:
    radial-gradient(circle at 70% 40%, rgba(33,150,176,0.15) 0%, transparent 60%),
    radial-gradient(circle at 20% 80%, rgba(232,160,32,0.08) 0%, transparent 50%);
}

/* Vague décorative */
.hero-wave {
  position: absolute; bottom: 0; left: 0; right: 0;
}

.hero-content { position: relative; z-index: 2; max-width: 680px; }
.hero-eyebrow {
  font-family: 'Space Mono', monospace;
  font-size: 11px; letter-spacing: 3px;
  color: var(--gold);
  text-transform: uppercase;
  margin-bottom: 20px;
  display: flex; align-items: center; gap: 10px;
}
.hero-eyebrow::before {
  content: '';
  display: block; width: 30px; height: 2px;
  background: var(--gold);
}

.hero h1 {
  font-family: 'Playfair Display', serif;
  font-size: clamp(42px, 6vw, 72px);
  font-weight: 900;
  color: var(--blanc);
  line-height: 1.08;
  margin-bottom: 24px;
}
.hero h1 em {
  font-style: normal;
  color: var(--gold);
}

.hero-desc {
  font-size: 17px; font-weight: 300;
  color: rgba(248,248,244,0.75);
  line-height: 1.7;
  max-width: 520px;
  margin-bottom: 36px;
}

.hero-actions { display: flex; gap: 14px; flex-wrap: wrap; }
.btn-hero-primary {
  background: var(--gold);
  color: var(--ocean);
  padding: 14px 30px;
  border-radius: 4px;
  font-weight: 700; font-size: 14px;
  text-decoration: none;
  letter-spacing: .5px;
  transition: all .2s;
  display: inline-block;
}
.btn-hero-primary:hover { background: var(--gold2); transform: translateY(-1px); }
.btn-hero-secondary {
  background: transparent;
  color: var(--blanc);
  padding: 14px 30px;
  border-radius: 4px;
  font-weight: 500; font-size: 14px;
  text-decoration: none;
  border: 1px solid rgba(248,248,244,0.3);
  transition: all .2s;
  display: inline-block;
}
.btn-hero-secondary:hover { border-color: var(--blanc); background: rgba(255,255,255,0.05); }

.hero-stats {
  position: absolute; right: 5%; bottom: 80px; z-index: 2;
  display: flex; flex-direction: column; gap: 16px;
}
.hero-stat {
  background: rgba(255,255,255,0.07);
  border: 1px solid rgba(33,150,176,0.3);
  border-left: 3px solid var(--gold);
  padding: 14px 20px;
  border-radius: 6px;
  backdrop-filter: blur(10px);
}
.hero-stat-val {
  font-family: 'Playfair Display', serif;
  font-size: 28px; font-weight: 700;
  color: var(--gold2);
}
.hero-stat-label {
  font-size: 11px; color: rgba(248,248,244,0.6);
  letter-spacing: 1px; text-transform: uppercase;
  margin-top: 2px;
}

/* ── SERVICES RAPIDES ── */
.services-rapides {
  background: var(--ocean);
  padding: 0;
  margin-top: -2px;
}
.services-grid {
  display: grid;
  grid-template-columns: repeat(5, 1fr);
  border-top: 2px solid var(--wave);
}
.service-item {
  padding: 24px 20px;
  border-right: 1px solid rgba(255,255,255,0.08);
  cursor: pointer;
  transition: background .2s;
  text-decoration: none;
  display: flex; flex-direction: column; align-items: center;
  gap: 10px;
  text-align: center;
}
.service-item:last-child { border-right: none; }
.service-item:hover { background: rgba(33,150,176,0.2); }
.service-icon { font-size: 28px; }
.service-label {
  font-size: 12px; font-weight: 600;
  color: rgba(248,248,244,0.8);
  letter-spacing: .3px;
  line-height: 1.3;
}

/* ── SECTIONS COMMUNES ── */
section { padding: 80px 5%; }
.section-eyebrow {
  font-family: 'Space Mono', monospace;
  font-size: 10px; letter-spacing: 3px;
  color: var(--wave);
  text-transform: uppercase;
  margin-bottom: 10px;
}
.section-title {
  font-family: 'Playfair Display', serif;
  font-size: clamp(28px, 4vw, 42px);
  font-weight: 700;
  color: var(--ocean);
  line-height: 1.2;
  margin-bottom: 16px;
}
.section-title span { color: var(--gold); }
.section-desc {
  font-size: 16px; color: #4a6a80;
  line-height: 1.7; max-width: 560px;
  margin-bottom: 48px;
}
.section-header { display: flex; justify-content: space-between; align-items: flex-end; margin-bottom: 40px; }
.voir-tout {
  font-size: 13px; font-weight: 600;
  color: var(--wave);
  text-decoration: none;
  display: flex; align-items: center; gap: 6px;
  transition: gap .2s;
  white-space: nowrap;
}
.voir-tout:hover { gap: 10px; }

/* ── PROJETS ── */
.projets-section { background: var(--sable); }
.projets-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
  gap: 24px;
}
.projet-card {
  background: white;
  border-radius: 8px;
  overflow: hidden;
  box-shadow: 0 2px 16px rgba(10,37,64,0.08);
  transition: all .25s;
  text-decoration: none;
  color: inherit;
  display: block;
}
.projet-card:hover { transform: translateY(-4px); box-shadow: 0 8px 32px rgba(10,37,64,0.15); }
.projet-img {
  width: 100%; height: 200px;
  object-fit: cover;
  background: linear-gradient(135deg, var(--ocean2), var(--wave));
  display: flex; align-items: center; justify-content: center;
  color: white; font-size: 40px;
}
.projet-img img { width: 100%; height: 100%; object-fit: cover; }
.projet-body { padding: 20px; }
.projet-status {
  display: inline-flex; align-items: center; gap: 6px;
  font-size: 11px; font-weight: 600;
  padding: 4px 10px; border-radius: 20px;
  margin-bottom: 10px;
  text-transform: uppercase; letter-spacing: .5px;
}
.status-cours { background: #e8f4fd; color: var(--wave); }
.status-termine { background: #e8f7ee; color: var(--vert); }
.status-dot { width: 6px; height: 6px; border-radius: 50%; background: currentColor; }
.projet-body h3 {
  font-family: 'Playfair Display', serif;
  font-size: 18px; font-weight: 700;
  color: var(--ocean); margin-bottom: 8px;
  line-height: 1.3;
}
.projet-body p { font-size: 13px; color: #5a7a8a; line-height: 1.6; }
.projet-progress {
  margin-top: 14px;
  height: 4px;
  background: #e8eef2;
  border-radius: 2px;
  overflow: hidden;
}
.projet-progress-bar {
  height: 100%;
  background: linear-gradient(90deg, var(--wave), var(--gold));
  border-radius: 2px;
  transition: width 1s ease;
}
.projet-pct {
  font-family: 'Space Mono', monospace;
  font-size: 11px; color: var(--gris);
  margin-top: 6px; text-align: right;
}

/* ── DIRECTIONS ── */
.directions-section { background: white; }
.directions-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
  gap: 16px;
}
.direction-card {
  background: var(--sable);
  border-radius: 8px;
  padding: 28px 20px;
  text-align: center;
  cursor: pointer;
  transition: all .2s;
  text-decoration: none;
  color: inherit;
  border: 1px solid transparent;
}
.direction-card:hover {
  background: var(--ocean);
  color: var(--blanc);
  border-color: var(--wave);
  transform: translateY(-2px);
}
.direction-card:hover .direction-label { color: var(--gold); }
.direction-card:hover .direction-desc { color: rgba(248,248,244,0.7); }
.direction-icon { font-size: 36px; margin-bottom: 12px; }
.direction-label {
  font-weight: 700; font-size: 14px;
  color: var(--ocean);
  margin-bottom: 6px;
  transition: color .2s;
}
.direction-desc {
  font-size: 12px; color: #6a8a9a;
  line-height: 1.5;
  transition: color .2s;
}

/* ── ACTUALITES ── */
.actu-section { background: var(--ocean); }
.actu-section .section-title { color: var(--blanc); }
.actu-section .section-desc { color: rgba(248,248,244,0.6); }
.actu-grid {
  display: grid;
  grid-template-columns: 2fr 1fr 1fr;
  gap: 20px;
}
.actu-card {
  background: rgba(255,255,255,0.06);
  border: 1px solid rgba(33,150,176,0.2);
  border-radius: 8px;
  overflow: hidden;
  cursor: pointer;
  transition: all .2s;
  text-decoration: none;
  color: inherit;
}
.actu-card:hover { background: rgba(33,150,176,0.15); border-color: var(--wave); }
.actu-img {
  width: 100%; height: 180px;
  background: linear-gradient(135deg, var(--ocean2), var(--wave));
  display: flex; align-items: center; justify-content: center;
  font-size: 48px;
}
.actu-card.featured .actu-img { height: 260px; }
.actu-body { padding: 18px; }
.actu-cat {
  font-family: 'Space Mono', monospace;
  font-size: 10px; color: var(--gold);
  letter-spacing: 2px; text-transform: uppercase;
  margin-bottom: 8px;
}
.actu-body h3 {
  font-family: 'Playfair Display', serif;
  font-size: 17px; font-weight: 700;
  color: var(--blanc);
  line-height: 1.3; margin-bottom: 8px;
}
.actu-card.featured .actu-body h3 { font-size: 22px; }
.actu-body p { font-size: 13px; color: rgba(248,248,244,0.55); line-height: 1.6; }
.actu-date {
  font-size: 11px; color: var(--gris);
  margin-top: 12px; font-family: 'Space Mono', monospace;
}

/* ── CHIFFRES CLÉS ── */
.chiffres-section {
  background: linear-gradient(135deg, var(--ocean2), var(--ocean));
  padding: 60px 5%;
}
.chiffres-grid {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 2px;
  background: rgba(255,255,255,0.1);
  border-radius: 8px;
  overflow: hidden;
}
.chiffre-item {
  background: rgba(10,37,64,0.7);
  padding: 40px 30px;
  text-align: center;
  transition: background .2s;
}
.chiffre-item:hover { background: rgba(33,150,176,0.2); }
.chiffre-val {
  font-family: 'Playfair Display', serif;
  font-size: 48px; font-weight: 900;
  color: var(--gold2);
  line-height: 1;
  margin-bottom: 8px;
}
.chiffre-label {
  font-size: 13px; color: rgba(248,248,244,0.6);
  text-transform: uppercase; letter-spacing: 1px;
  line-height: 1.4;
}

/* ── PAIEMENT EN LIGNE ── */
.paiement-section {
  background: var(--sable);
  padding: 80px 5%;
}
.paiement-inner {
  background: var(--ocean);
  border-radius: 12px;
  padding: 60px;
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 60px;
  align-items: center;
}
.paiement-text .section-title { color: var(--blanc); margin-bottom: 16px; }
.paiement-text p { color: rgba(248,248,244,0.7); line-height: 1.7; margin-bottom: 28px; }
.paiement-badges { display: flex; gap: 12px; flex-wrap: wrap; }
.badge-mobile {
  background: rgba(33,150,176,0.2);
  border: 1px solid rgba(33,150,176,0.4);
  color: var(--blanc);
  padding: 8px 16px;
  border-radius: 4px;
  font-size: 12px; font-weight: 600;
}
.paiement-actions { display: flex; flex-direction: column; gap: 12px; }
.paiement-btn {
  padding: 16px 24px;
  border-radius: 6px;
  font-size: 14px; font-weight: 600;
  text-decoration: none;
  display: flex; align-items: center; gap: 12px;
  transition: all .2s;
}
.paiement-btn-primary {
  background: var(--gold);
  color: var(--ocean);
}
.paiement-btn-primary:hover { background: var(--gold2); }
.paiement-btn-secondary {
  background: rgba(255,255,255,0.08);
  color: var(--blanc);
  border: 1px solid rgba(255,255,255,0.15);
}
.paiement-btn-secondary:hover { background: rgba(33,150,176,0.2); }

/* ── FOOTER ── */
footer {
  background: var(--ocean);
  border-top: 1px solid rgba(33,150,176,0.3);
  padding: 60px 5% 30px;
}
.footer-grid {
  display: grid;
  grid-template-columns: 2fr 1fr 1fr 1fr;
  gap: 40px;
  margin-bottom: 40px;
}
.footer-brand p {
  font-size: 13px; color: rgba(248,248,244,0.5);
  line-height: 1.7; margin-top: 14px; max-width: 280px;
}
.footer-col h4 {
  font-size: 11px; font-weight: 700;
  color: var(--gold);
  letter-spacing: 2px; text-transform: uppercase;
  margin-bottom: 16px;
}
.footer-col a {
  display: block;
  font-size: 13px; color: rgba(248,248,244,0.55);
  text-decoration: none; margin-bottom: 10px;
  transition: color .2s;
}
.footer-col a:hover { color: var(--blanc); }
.footer-bottom {
  border-top: 1px solid rgba(255,255,255,0.08);
  padding-top: 24px;
  display: flex; justify-content: space-between; align-items: center;
}
.footer-bottom p { font-size: 12px; color: rgba(248,248,244,0.35); }
.footer-wave-line {
  width: 40px; height: 2px;
  background: linear-gradient(90deg, var(--wave), var(--gold));
  margin: 8px 0;
}

/* ── RESPONSIVE ── */
@media (max-width: 900px) {
  .hero-stats { display: none; }
  .services-grid { grid-template-columns: repeat(3,1fr); }
  .actu-grid { grid-template-columns: 1fr; }
  .chiffres-grid { grid-template-columns: repeat(2,1fr); }
  .paiement-inner { grid-template-columns: 1fr; padding: 40px; gap: 30px; }
  .footer-grid { grid-template-columns: 1fr 1fr; }
  .nav-links { display: none; }
}
@media (max-width: 600px) {
  .services-grid { grid-template-columns: repeat(2,1fr); }
  .chiffres-grid { grid-template-columns: 1fr 1fr; }
  .footer-grid { grid-template-columns: 1fr; }
  section { padding: 60px 5%; }
  .hero { padding: 100px 5% 80px; }
}

/* ── ANIMATION SCROLL ── */
.reveal {
  opacity: 0;
  transform: translateY(24px);
  transition: opacity .6s ease, transform .6s ease;
}
.reveal.visible {
  opacity: 1;
  transform: translateY(0);
}

.projet-placeholder {
    width: 100%;
    height: 200px;
    background: linear-gradient(135deg, #1e3c72, #2a5298);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 48px;
    border-radius: 12px;
}

.projet-img {
    width: 100%;
    height: 200px; /* force la hauteur de la carte */
    overflow: hidden;
    border-radius: 12px;
}

.projet-img video,
.projet-img img {
    width: 100%;
    height: 100%;
    object-fit: cover; /* crop au lieu d’étirer */
    display: block;
}

/* ── PLAN COMMUNAL DE DEVELOPPEMENT VIEWER ── */
.pcd-section {
  background: linear-gradient(135deg, var(--ocean) 0%, var(--ocean2) 100%);
  padding: 80px 5%;
}
.pcd-inner {
  max-width: 1200px;
  margin: 0 auto;
}
.pcd-header { text-align: center; max-width: 800px; margin: 0 auto 40px; }
.pcd-header p { color: rgba(248,248,244,0.7); margin: 16px 0 24px; }
.pcd-actions { display: flex; gap: 12px; justify-content: center; flex-wrap: wrap; }

.pcd-viewer {
  background: #0a0f14;
  border: 1px solid rgba(33,150,176,0.3);
  border-radius: 12px;
  overflow: hidden;
  box-shadow: 0 20px 40px rgba(0,0,0,0.3);
}
.pcd-toolbar {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 12px 20px;
  background: rgba(255,255,255,0.04);
  border-bottom: 1px solid rgba(33,150,176,0.2);
  color: rgba(248,248,244,0.8);
  font-size: 13px;
  font-family: 'Space Mono', monospace;
}
.pcd-iframe {
  width: 100%;
  height: 800px; /* Hauteur desktop. 3 écrans de lecture */
  border: 0;
  background: #fff;
}
.pcd-mobile-fallback { display: none; padding: 40px 20px; text-align: center; }
.pcd-mobile-fallback p { color: rgba(248,248,244,0.7); margin-bottom: 16px; }

/* Cache l’iframe si le navigateur ne supporte pas = iPhone vieux */
@supports not (aspect-ratio: 1 / 1) {
  .pcd-iframe { display: none; }
  .pcd-mobile-fallback { display: block; }
}

@media (max-width: 900px) {
  .pcd-iframe { height: 600px; } /* Plus petit sur mobile pour ne pas ramer */
}
@media (max-width: 640px) {
  .pcd-iframe { height: 500px; }
}

/* ── MOT DU MAIRE V2 COMPACT ── */
.maire-section {
  background: var(--ocean);
  padding: 60px 5%;
}
.maire-card {
  max-width: 900px;
  margin: 0 auto;
  background: rgba(255,255,255,0.04);
  border: 1px solid rgba(33,150,176,0.3);
  border-radius: 12px;
  padding: 30px;
  display: flex;
  align-items: center;
  gap: 30px;
  backdrop-filter: blur(10px);
}
.maire-photo-wrap {
  flex-shrink: 0;
  width: 160px;
  height: 160px;
  border-radius: 50%;
  overflow: hidden;
  border: 3px solid var(--gold);
  box-shadow: 0 0 0 6px rgba(232,160,32,0.15);
}
.maire-photo-wrap img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  object-position: center top; /* Centre le visage */
}
.maire-content { flex: 1; }
.maire-tag {
  font-family: 'Space Mono', monospace;
  font-size: 10px;
  color: var(--gold);
  letter-spacing: 2px;
  text-transform: uppercase;
}
.maire-content h3 {
  font-family: 'Playfair Display', serif;
  font-size: 24px;
  color: var(--blanc);
  margin: 6px 0 12px;
}
.maire-content p {
  font-size: 15px;
  color: rgba(248,248,244,0.75);
  line-height: 1.6;
  font-style: italic;
  border-left: 2px solid var(--wave);
  padding-left: 14px;
}

/* Mobile */
@media (max-width: 640px) {
  .maire-card { flex-direction: column; text-align: center; padding: 24px; }
  .maire-content p { border-left: none; padding-left: 0; }
}

/* bouton admin */
/* ── NAVBAR ── */
nav {
  position: fixed; top: 0; left: 0; right: 0; z-index: 100;
  background: rgba(10,37,64,0.97);
  backdrop-filter: blur(10px);
  display: flex; align-items: center; justify-content: space-between;
  padding: 0 5%;
  height: 68px;
  border-bottom: 1px solid rgba(33,150,176,0.3);
}
.nav-logo { display: flex; align-items: center; gap: 12px; text-decoration: none; }
.nav-logo img { height: 40px; width: 40px; border-radius: 50%; border: 2px solid var(--gold); object-fit: cover; }
.nav-logo-text { font-family: 'Space Mono', monospace; font-size: 11px; font-weight: 700; color: var(--blanc); letter-spacing: 1.5px; text-transform: uppercase; line-height: 1.3; }
.nav-logo-text span { color: var(--gold); display: block; }

.nav-links { display: flex; gap: 32px; align-items: center; }
.nav-links a { color: rgba(248,248,244,0.7); text-decoration: none; font-size: 13px; font-weight: 500; letter-spacing: .5px; transition: color .2s; text-transform: uppercase; }
.nav-links a:hover { color: var(--gold); }

/* Bouton Admin Desktop */
.nav-admin-desktop { display: block; }
.nav-admin-mobile { display: none; } /* Caché sur desktop */
.btn-admin {
  background: var(--gold); color: var(--ocean); padding: 8px 20px; border-radius: 4px;
  font-weight: 700; font-size: 13px; text-decoration: none; font-family: 'Space Mono', monospace;
  text-transform: uppercase; letter-spacing: 1px; transition: .2s; border: 1px solid var(--gold);
}
.btn-admin:hover { background: transparent; color: var(--gold); }

/* Le bouton Burger : caché par défaut sur PC */
.nav-toggle {
  display: none;
  background: none; border: none;
  color: var(--blanc); font-size: 24px; cursor: pointer;
  padding: 8px;
}

/* ── RESPONSIVE : MOBILE / TABLETTE ── */
@media (max-width: 900px) {
  .nav-links {
    display: none; /* Caché par défaut */
    position: absolute;
    top: 68px; left: 0; right: 0;
    background: rgba(10,37,64,0.98);
    backdrop-filter: blur(10px);
    flex-direction: column;
    gap: 0;
    padding: 20px 0;
    border-bottom: 1px solid rgba(33,150,176,0.3);
  }
  .nav-links.active { display: flex; } /* On l'affiche avec JS */

  .nav-links a { padding: 14px 5%; width: 100%; text-align: center; border-top: 1px solid rgba(255,255,255,0.05); }

  .nav-admin-desktop { display: none; } /* On cache le bouton Or à droite */
  .nav-admin-mobile { display: block; width: 100%; padding: 14px 5%; border-top: 1px solid rgba(255,255,255,0.05); }
  .nav-admin-mobile .btn-admin { display: block; text-align: center; }

  .nav-toggle { display: block; } /* On affiche le ☰ seulement ici */

  .hero-stats { display: none; }
  .services-grid { grid-template-columns: repeat(3,1fr); }

}

/* bouton admin */
</style>
</head>
<body>
<!-- NAVBAR -->
{{-- @include('components.urgence-card') --}}
<nav>
  <a class="nav-logo" href="#">
    <img src="https://villedetoamasina.mg/assets/LogoComm.png" alt="Logo CUT" onerror="this.style.display='none'">
    <div class="nav-logo-text">
      Commune Urbaine
      <span>de Toamasina</span>
    </div>
  </a>
  <div class="nav-links" id="navLinks">
    {{-- <a href="#directions">Directions</a> --}}
    {{-- <a href="#rapports">Rapport</a> --}}
    <a href="#projets">Projets</a>
    <a href="#actualites">Actualités</a>
    <a href="#plancommunal">Plan Communal</a>
    <a href="">Urgence</a>
    {{-- <a href="#paiement">Services en ligne</a> --}}
    {{-- <a href="#paiement" class="nav-cta">Payer en ligne</a> --}}

    <div class="nav-admin-mobile">
        <a href="{{ url('/admin') }}" class="btn-admin">Admin →</a>
    </div>
  </div>

    <div class="nav-admin-desktop">
      <a href="{{ url('/admin') }}" class="btn-admin">Admin →</a>
    </div>

    <button class="nav-toggle" id="navToggle">☰</button>
</nav>

<!-- HERO -->
<section class="hero">
  <div class="hero-bg"></div>
  <div class="hero-content">
    <div class="hero-eyebrow">Commune Urbaine de Toamasina</div>
    <h1>Commune<br><em>Urbaine</em><br>de Toamasina.</h1>
    <p class="hero-desc">Découvrez les projets, services et directions de votre commune. Une administration moderne, au service des habitants de Toamasina.</p>
    <div class="hero-actions">
      <a href="#projets" class="btn-hero-primary">Voir les projets →</a>
      <a href="#paiement" class="btn-hero-secondary">Plan Communal</a>
    </div>
  </div>

  <svg class="hero-wave" viewBox="0 0 1440 60" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M0,30 C360,60 720,0 1080,30 C1260,45 1380,20 1440,30 L1440,60 L0,60 Z" fill="#1a2a3a" opacity="0.5"/>
  </svg>
</section>

<!-- SERVICES RAPIDES -->
<div class="services-rapides">
  <div class="services-grid">
    <a href="#paiement" class="service-item">
      <div class="service-icon">💳</div>
      <div class="service-label">Payer une taxe</div>
    </a>
    <a href="#projets" class="service-item">
      <div class="service-icon">🏗️</div>
      <div class="service-label">Projets en cours</div>
    </a>
    <a href="#actualites" class="service-item">
      <div class="service-icon">📢</div>
      <div class="service-label">Actualités</div>
    </a>
    <a href="https://villedetoamasina.mg/rapports" class="service-item">
      <div class="service-icon">📄</div>
      <div class="service-label">Rapports officiels</div>
    </a>
    <a href="#plancommunal" class="service-item">
      <div class="service-icon">📄</div>
      <div class="service-label">Plan Communal</div>
    </a>
  </div>
</div>

<!-- MOT DU MAIRE -->
<section class="maire-section" id="maire">
  <div class="maire-card reveal">
    <div class="maire-photo-wrap">
      <img src="{{ asset('assets/MAIRE TOAMASINA I.jpeg') }}" alt="Maire de Toamasina">
    </div>
    <div class="maire-content">
      <span class="maire-tag">Maire de la Commune Urbaine de Toamasina</span>
      <h3>Alain ANDRIAFANOMEZANTSOA</h3>
      <p>
        "Tamatave : Tanagnantsika, Mandroso Mifankatia."
      </p>
    </div>
  </div>
</section>

<!-- PROJETS -->
<!-- PROJETS -->
<section class="projets-section" id="projets">
  <div class="section-header reveal">
    <div>
      <div class="section-eyebrow">En cours & terminés</div>
      <div class="section-title">Projets de la <span>commune</span></div>
    </div>
    <a href="{{ route('projets.index') }}" class="voir-tout">Tous les projets →</a>
  </div>

  <div class="projets-grid">
    @if($projetsSemaine->count() > 0)
      @foreach($projetsSemaine as $projet)
      <a href="{{ route('projets.show', $projet->slug) }}" class="projet-card reveal">
        <div class="projet-img">
            @if($projet->video)
                {{-- Si y'a une vidéo, on l'affiche --}}
                <video controls preload="metadata" poster="{{ $projet->image ? asset('storage/' . $projet->image) : '' }}">
                    <source src="{{ asset('storage/' . $projet->video) }}" type="video/mp4">
                    Votre navigateur ne supporte pas la vidéo.
                </video>
            @elseif($projet->image)
                {{-- Sinon on affiche l'image --}}
                <img src="{{ asset('storage/' . $projet->image) }}" alt="{{ $projet->titre }}">
            @else
                {{-- Fallback si rien --}}
                <div class="projet-placeholder">Veuillez entrer une image ou une video</div>
            @endif
        </div>
        <div class="projet-body">
          <div class="projet-status {{ $projet->statut == 'Terminé' ? 'status-termine' : 'status-cours' }}">
            <span class="status-dot"></span>{{ $projet->statut }}
          </div>
          <h3>{{ $projet->titre }}</h3>
          <p>{{ Str::limit(strip_tags($projet->description), 100) }}</p>
          <div class="projet-progress">
            <div class="projet-progress-bar" style="width:{{ $projet->progression }}%"></div>
          </div>
          <div class="projet-pct">{{ $projet->progression }}%</div>
        </div>
      </a>
      @endforeach
    @else
      <p>Aucun projet pour le moment.</p>
    @endif
  </div>
</section>

<!-- DIRECTIONS -->
<!-- DIRECTIONS
<section class="directions-section" id="directions">
  <div class="section-header reveal">
    <div>
      <div class="section-eyebrow">Organisation municipale</div>
      <div class="section-title">Nos <span>directions</span></div>
    </div>
    <a href="https://villedetoamasina.mg/directions" class="voir-tout">Toutes les directions →</a>
  </div>
  <div class="directions-grid">
    <a href="https://villedetoamasina.mg/directions" class="direction-card reveal">
      <div class="direction-icon">🚌</div>
      <div class="direction-label">Transport</div>
      <div class="direction-desc">Gestion des transports urbains et cyclo-pousse</div>
    </a>
    <a href="https://villedetoamasina.mg/directions" class="direction-card reveal">
      <div class="direction-icon">🌿</div>
      <div class="direction-label">Environnement</div>
      <div class="direction-desc">Propreté, espaces verts et développement durable</div>
    </a>
    <a href="https://villedetoamasina.mg/directions" class="direction-card reveal">
      <div class="direction-icon">🛒</div>
      <div class="direction-label">Marchés & Abattoirs</div>
      <div class="direction-desc">Gestion des marchés municipaux et abattoirs</div>
    </a>
    <a href="https://villedetoamasina.mg/directions" class="direction-card reveal">
      <div class="direction-icon">💻</div>
      <div class="direction-label">Système d'Information</div>
      <div class="direction-desc">Digitalisation et modernisation des services</div>
    </a>
    <a href="https://villedetoamasina.mg/directions" class="direction-card reveal">
      <div class="direction-icon">💰</div>
      <div class="direction-label">Finances</div>
      <div class="direction-desc">Budget, recouvrement et comptabilité communale</div>
    </a>
    <a href="https://villedetoamasina.mg/directions" class="direction-card reveal">
      <div class="direction-icon">🏥</div>
      <div class="direction-label">Hygiène & Santé</div>
      <div class="direction-desc">Santé publique et hygiène urbaine</div>
    </a>
    <a href="https://villedetoamasina.mg/directions" class="direction-card reveal">
      <div class="direction-icon">🎓</div>
      <div class="direction-label">Éducation</div>
      <div class="direction-desc">Écoles primaires publiques communales</div>
    </a>
  </div>
</section>
-->
<!-- DIRECTIONS -->

<!-- ACTUALITÉS -->
<section class="actu-section" id="actualites">
  <div class="section-header reveal">
    <div>
      <div class="section-eyebrow">Vie de la commune</div>
      <div class="section-title" style="color:var(--blanc)">Actualités <span>récentes</span></div>
    </div>
    <a href="{{ route('actualites.index') }}" class="voir-tout" style="color:var(--gold)">Toutes les actus →</a>
  </div>

  <div class="actu-grid">
    @forelse($actualitesRecentes as $i => $actu)
      <a href="https://www.facebook.com/profile.php?id=100070786701510"
         class="actu-card reveal {{ $i === 0 ? 'featured' : '' }}">

        <div class="actu-img">
          @if($actu->video)
            <video muted autoplay loop playsinline
                   style="width:100%;height:100%;object-fit:cover;display:block;">
              <source src="{{ asset('storage/'.$actu->video) }}" type="video/mp4">
            </video>
          @elseif($actu->image)
            <img src="{{ asset('storage/'.$actu->image) }}"
                 alt="{{ $actu->titre }}"
                 style="width:100%;height:100%;object-fit:cover;display:block;">
          @else
            📰
          @endif
        </div>

        <div class="actu-body">
          <div class="actu-cat">{{ $actu->categorie }}</div>
          <h3>{{ $actu->titre }}</h3>
          <p>{{ Str::limit(strip_tags($actu->contenu), 120) }}</p>
          <div class="actu-date">
            {{ $actu->date_publication
                ? \Carbon\Carbon::parse($actu->date_publication)->translatedFormat('F Y')
                : $actu->created_at->translatedFormat('F Y') }}
          </div>
        </div>
      </a>
    @empty
      <p style="color:rgba(248,248,244,0.5); grid-column:1/-1; text-align:center; padding:40px 0;">
        Aucune actualité pour le moment.
      </p>
    @endforelse
  </div>
</section>

<!-- PAIEMENT EN LIGNE -->
<!--
<section class="paiement-section" id="paiement">
  <div class="paiement-inner reveal">
    <div class="paiement-text">
      <div class="section-eyebrow" style="color:var(--wave)">Services numériques</div>
      <div class="section-title" style="color:var(--blanc); margin-bottom:16px">Payez vos taxes<br><span>en ligne</span></div>
      <p>Taxes de marché, droits d'occupation, amendes et permis — tout depuis votre téléphone via Mobile Money.</p>
      <div class="paiement-badges">
        <span class="badge-mobile">📱 MVola</span>
        <span class="badge-mobile">🟠 Orange Money</span>
        <span class="badge-mobile">🔴 Airtel Money</span>
      </div>
    </div>
    <div class="paiement-actions">
      <a href="#" class="paiement-btn paiement-btn-primary">💳 Payer une taxe de marché</a>
      <a href="#" class="paiement-btn paiement-btn-secondary">📄 Demander un permis</a>
      <a href="#" class="paiement-btn paiement-btn-secondary">🚌 Renouveler licence cyclo-pousse</a>
      <a href="#" class="paiement-btn paiement-btn-secondary">📋 Consulter un reçu</a>
    </div>
  </div>
</section>
-->

<!-- PLAN COMMUNAL DE DEVELOPPEMENT -->
<section class="pcd-section" id="pcd">
  <div class="pcd-inner reveal">

    <div class="pcd-header">
      <div class="section-eyebrow" style="color:var(--wave)">Documents de référence</div>
      <div class="section-title" style="color:var(--blanc)">Planification <span>Communale</span></div>
      <p>Consultez et téléchargez les documents officiels de la Commune Urbaine de Toamasina.</p>
    </div>

    <div class="pcd-grid">

      {{-- PDF 1 : CMH CUT Final --}}
      <div class="pcd-viewer">
        <div class="pcd-toolbar">
          <span>📄 CMH_CUT_Final.pdf</span>
          <a href="{{ asset('assets/pdf/CMH_CUT_Final.pdf') }}" download class="pcd-download">⬇️</a>
        </div>
        <iframe
          src="{{ asset('assets/pdf/CMH_CUT_Final.pdf') }}#toolbar=1&navpanes=0&scrollbar=1"
          class="pcd-iframe"
          title="CMH CUT Final">
        </iframe>
        <div class="pcd-mobile-fallback">
          <a href="{{ asset('assets/pdf/CMH_CUT_Final.pdf') }}" target="_blank" class="btn-hero-primary">Ouvrir CMH CUT</a>
        </div>
      </div>

      {{-- PDF 2 : PCD 2025-2030 --}}
      <div class="pcd-viewer">
        <div class="pcd-toolbar">
          <span>📄 PCD_Toamasina_2025-2030.pdf</span>
          <a href="{{ asset('assets/pdf/24_06_2026_PCGDS_CUT_Final.pdf') }}" download class="pcd-download">⬇️</a>
        </div>
        <iframe
          src="{{ asset('assets/pdf/24_06_2026_PCGDS_CUT_Final.pdf') }}#toolbar=1&navpanes=0&scrollbar=1"
          class="pcd-iframe"
          title="PCD 2025-2030">
        </iframe>
        <div class="pcd-mobile-fallback">
          <a href="{{ asset('assets/pdf/24_06_2026_PCGDS_CUT_Final.pdf') }}" target="_blank" class="btn-hero-primary">Ouvrir PCD 2025-2030</a>
        </div>
      </div>

    </div>

  </div>
</section>

{{-- PHARMACIE DE GARDE --}}
<!-- URGENCES / SIGNALEMENTS -->
<section class="projets-section" id="urgences" style="background: var(--ocean);">
  <div class="section-header reveal">
    <div>
      <div class="section-eyebrow" style="color:var(--wave)">Citoyens</div>
      <div class="section-title" style="color:var(--blanc)">Signalez une <span>urgence</span></div>
      <p class="section-desc" style="color:rgba(248,248,244,0.7)">Vol,insecuriter, lampe grillée ? La commune intervient.</p>
    </div>
    <a href="{{ route('signalements.create') }}" class="btn-hero-primary">Signaler maintenant →</a>
  </div>

  @if($signalementsRecentes->count() > 0)
    <div class="projets-grid">
      @foreach($signalementsRecentes as $signalement)
        @include('components.signalement-card', ['signalement' => $signalement])
      @endforeach
    </div>
  @else
    <p style="color:rgba(248,248,244,0.5); text-align:center; padding:40px 0;">Aucune urgence signalée récemment.</p>
  @endif
</section>

{{-- <x-urgence-card /> --}}
@include('components.urgence-card')

<!-- FOOTER -->
<footer>
  <div class="footer-grid">
    <div class="footer-brand">
      <div class="nav-logo-text" style="font-size:13px">
        Commune Urbaine
        <span style="color:var(--gold)">de Toamasina</span>
      </div>
      <div class="footer-wave-line"></div>
      <p>Administration municipale de la ville de Toamasina, capitale économique de Madagascar, engagée dans la modernisation des services publics.</p>
    </div>
    <div class="footer-col">
      <h4>Services</h4>
      {{-- <a href="#">Paiement en ligne</a> --}}
      <a href="#">Demande de permis</a>
      <a href="#">Guichet unique</a>
      <a href="#">Marchés publics</a>
    </div>
    <div class="footer-col">
      <h4>La commune</h4>
      <a href="https://villedetoamasina.mg/directions">Directions</a>
      <a href="https://villedetoamasina.mg/projets">Projets</a>
      <a href="https://villedetoamasina.mg/rapports">Rapports</a>
      <a href="#">Budget communal</a>
    </div>
    <div class="footer-col">
      <h4>Contact</h4>
      <a href="#">📍 Avenue de l'independance, Toamasina, Madagascar, 501</a>
      <a href="#">📞 034 99 980 89</a>
      <a href="#">✉️ altessesandra3@gmail.com</a>
      <a href="#">🕐 Lun–Ven 8h–16h</a>
    </div>
  </div>
  <div class="footer-bottom">
    <p>© 2026 – Commune Urbaine de Toamasina. Tous droits réservés.</p>
    <p style="color:rgba(248,248,244,0.2); font-size:11px">DSI – Direction des Systèmes d'Information</p>
  </div>
</footer>

<script>
// Scroll reveal
const observer = new IntersectionObserver((entries) => {
  entries.forEach(e => {
    if (e.isIntersecting) {
      e.target.classList.add('visible');
      observer.unobserve(e.target);
    }
  });
}, { threshold: 0.1 });

document.querySelectorAll('.reveal').forEach(el => observer.observe(el));

// Barre de progression animée
document.querySelectorAll('.projet-progress-bar').forEach(bar => {
  const width = bar.style.width;
  bar.style.width = '0';
  setTimeout(() => { bar.style.width = width; }, 300);
});
</script>

{{-- bouton admin --}}

    <script>
// Menu Burger Toggle
const navToggle = document.getElementById('navToggle');
const navLinks = document.getElementById('navLinks');

navToggle.addEventListener('click', () => {
  navLinks.classList.toggle('active');

  // Change ☰ en X quand ouvert
  if (navLinks.classList.contains('active')) {
    navToggle.innerHTML = '✕';
  } else {
    navToggle.innerHTML = '☰';
  }
});

// Scroll reveal
const observer = new IntersectionObserver((entries) => {
  entries.forEach(e => {
    if (e.isIntersecting) {
      e.target.classList.add('visible');
      observer.unobserve(e.target);
    }
  });
}, { threshold: 0.1 });
document.querySelectorAll('.reveal').forEach(el => observer.observe(el));

// Barre de progression animée
document.querySelectorAll('.projet-progress-bar').forEach(bar => {
  const width = bar.style.width;
  bar.style.width = '0';
  setTimeout(() => { bar.style.width = width; }, 300);
});
</script>

{{-- bouton admin --}}
</body>
</html>
