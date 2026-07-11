<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Commune Urbaine de Toamasina</title>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&family=Inter:wght@300;400;500;600&family=Space+Mono:wght@400;700&display=swap" rel="stylesheet">


<!-- audessusstyle -->
<link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon.png') }}">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

@vite(['resources/css/app.css', 'resources/js/app.js'])
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
        background: linear-gradient(160deg, var(--ocean) 0%, var(--ocean2) 50%, #0d3d5a 100%);
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

      /* styapp */
      @keyframes fade-in-down {
            0% { opacity: 0; transform: translateY(-20px); }
            100% { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-in-down {
            animation: fade-in-down 1s ease-out;
        }

        .animate-on-scroll {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.6s ease-out;
        }
        .animate-on-scroll.visible {
            opacity: 1;
            transform: translateY(0);
        }
</style>
</head>
<body>

<!-- NAVBAR -->
<nav>
  <a class="nav-logo" href="#">
    <img src="https://villedetoamasina.mg/assets/LogoComm.png" alt="Logo CUT" onerror="this.style.display='none'">
    <div class="nav-logo-text">
      Commune Urbaine
      <span>de Toamasina</span>
    </div>
  </a>
  <div class="nav-links">
    <a href="#directions">Directions</a>
    <a href="#projets">Projets</a>
    <a href="#actualites">Actualités</a>
    <a href="#paiement">Services en ligne</a>
    <a href="#paiement" class="nav-cta">Payer en ligne</a>
  </div>
</nav>
        {{-- MAIN --}}
<main>
        @yield('content')
</main>

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
      <a href="#">Paiement en ligne</a>
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
</body>
</html>
