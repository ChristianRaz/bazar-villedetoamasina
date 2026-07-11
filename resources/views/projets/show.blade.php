@extends('layouts.app')

@section('content')

<br><br><br>
<article class="min-h-screen bg-white w-full">
    {{-- Hero media debut --}}


    {{-- Hero media / Carrousel --}}
@php
    $images = $projet->images ?? [];
    $hasCarousel = count($images) > 1;
@endphp

@if($projet->video || $projet->image || count($images) > 0)
<div class="w-full bg-slate-900 py-6 flex justify-center">
    <div class="w-full max-w-3xl px-6">

        @if($projet->video)
            {{-- Vidéo prioritaire --}}
            <video controls preload="metadata"
                poster="{{ $projet->image ? asset('storage/'.$projet->image) : '' }}"
                class="w-full max-h-[420px] object-cover rounded-xl shadow-lg block">
                <source src="{{ asset('storage/'.$projet->video) }}" type="video/mp4">
            </video>

        @elseif($hasCarousel)
            {{-- Carrousel plusieurs images --}}
            <div id="carousel" style="position:relative; border-radius:12px; overflow:hidden;
                                      box-shadow:0 8px 32px rgba(0,0,0,0.3);">

                {{-- Images --}}
                @foreach($images as $i => $img)
                <div class="slide" style="display:{{ $i === 0 ? 'block' : 'none' }};">
                    <img src="{{ asset('storage/'.$img) }}"
                         alt="{{ $projet->titre }} - photo {{ $i+1 }}"
                         onclick="openLightbox(this.src)"
                         style="width:100%; max-height:420px; object-fit:cover;
                                display:block; cursor:zoom-in;">
                </div>
                @endforeach

                {{-- Bouton précédent --}}
                <button onclick="changeSlide(-1)"
                        style="position:absolute; left:12px; top:50%; transform:translateY(-50%);
                               background:rgba(0,0,0,0.5); color:white; border:none;
                               width:40px; height:40px; border-radius:50%; font-size:18px;
                               cursor:pointer; display:flex; align-items:center; justify-content:center;
                               transition:background .2s; z-index:5;"
                        onmouseover="this.style.background='rgba(0,0,0,0.8)'"
                        onmouseout="this.style.background='rgba(0,0,0,0.5)'">‹</button>

                {{-- Bouton suivant --}}
                <button onclick="changeSlide(1)"
                        style="position:absolute; right:12px; top:50%; transform:translateY(-50%);
                               background:rgba(0,0,0,0.5); color:white; border:none;
                               width:40px; height:40px; border-radius:50%; font-size:18px;
                               cursor:pointer; display:flex; align-items:center; justify-content:center;
                               transition:background .2s; z-index:5;"
                        onmouseover="this.style.background='rgba(0,0,0,0.8)'"
                        onmouseout="this.style.background='rgba(0,0,0,0.5)'">›</button>

                {{-- Compteur --}}
                <div style="position:absolute; bottom:12px; right:16px; background:rgba(0,0,0,0.6);
                            color:white; padding:4px 10px; border-radius:20px; font-size:12px; z-index:5;">
                    <span id="slide-current">1</span> / {{ count($images) }}
                </div>

                {{-- Points indicateurs --}}
                <div style="position:absolute; bottom:12px; left:50%; transform:translateX(-50%);
                            display:flex; gap:6px; z-index:5;">
                    @foreach($images as $i => $img)
                    <button onclick="goToSlide({{ $i }})"
                            class="dot"
                            style="width:8px; height:8px; border-radius:50%; border:none;
                                   background:{{ $i === 0 ? 'white' : 'rgba(255,255,255,0.4)' }};
                                   cursor:pointer; padding:0; transition:background .2s;">
                    </button>
                    @endforeach
                </div>
            </div>

        @elseif($projet->image)
            {{-- Image unique --}}
            <img src="{{ asset('storage/'.$projet->image) }}"
                 alt="{{ $projet->titre }}"
                 class="w-full max-h-[420px] object-cover rounded-xl shadow-lg block cursor-zoom-in"
                 onclick="openLightbox(this.src)">
        @endif

    </div>
</div>
@endif


    {{-- Her media fin --}}
    {{-- Contenu principal --}}
    <div class="w-full flex justify-center">
        <div class="w-full max-w-3xl px-6 md:px-12 py-10">

            <a href="{{ route('projets.index') }}"
               class="inline-flex items-center gap-2 text-sm text-gray-400 hover:text-blue-700 transition-colors mb-6">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>
                </svg>
                Retour aux projets
            </a>

            <h1 class="text-3xl md:text-4xl font-bold text-gray-900 leading-tight mb-2">
                {{ $projet->titre }}
            </h1>
            <div class="w-16 h-1 bg-yellow-400 rounded-full mb-10"></div>

            <div class="bg-slate-50 border border-slate-200 rounded-2xl p-6 mb-10 shadow-sm">
                <div class="flex justify-between items-center mb-4">
                    <span class="text-xs font-bold uppercase tracking-widest text-slate-400">Avancement du projet</span>
                    <span class="text-2xl font-extrabold text-blue-600">{{ $projet->progression }}%</span>
                </div>
                <div class="relative w-full bg-slate-200 rounded-full overflow-hidden mb-5" style="height:10px;">
                    <div class="absolute top-0 left-0 h-full rounded-full"
                         style="width:{{ $projet->progression }}%; background:linear-gradient(90deg,#1e40af,#3b82f6);"></div>
                </div>
                @php $termine = in_array($projet->statut, ['Terminé','Termine','terminé','termine']); @endphp
                <span class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full text-sm font-semibold
                    {{ $termine ? 'bg-green-100 text-green-800' : 'bg-amber-100 text-amber-800' }}">
                    <span class="w-2 h-2 rounded-full {{ $termine ? 'bg-green-500' : 'bg-amber-500' }}"></span>
                    {{ ucfirst(str_replace('_', ' ', $projet->statut)) }}
                </span>
            </div>

            <div class="prose prose-lg prose-slate max-w-none
                        prose-p:text-gray-600 prose-p:leading-relaxed prose-p:mb-4
                        prose-headings:text-gray-900 prose-strong:text-gray-800
                        prose-a:text-blue-600 prose-a:no-underline hover:prose-a:underline">
                {!! $projet->description !!}
            </div>
        </div>
    </div>
</article>

{{-- ======= LIGHTBOX (en dehors de article, tout en bas du body) ======= --}}
<div id="lightbox" style="
    display: none;
    position: fixed;
    top: 0; left: 0; right: 0; bottom: 0;
    z-index: 99999;
    background: rgba(0,0,0,0.88);
    backdrop-filter: blur(8px);
    align-items: center;
    justify-content: center;
    overflow: hidden;
">
    {{-- Fond cliquable pour fermer --}}
    <div onclick="closeLightbox()" style="position:absolute;inset:0;"></div>

    {{-- Bouton fermer --}}
    <button onclick="closeLightbox()" style="
        position: absolute;
        top: 16px; right: 20px;
        z-index: 10;
        background: rgba(255,255,255,0.15);
        border: none;
        color: white;
        width: 36px; height: 36px;
        border-radius: 50%;
        font-size: 20px;
        cursor: pointer;
        display: flex; align-items: center; justify-content: center;
    ">✕</button>

    {{-- Wrapper image --}}
    <div style="position:relative;z-index:5;display:flex;align-items:center;justify-content:center;width:100%;height:100%;padding:24px;box-sizing:border-box;">
        <img id="lightbox-img" src="" alt=""
             style="
                 max-width: 88vw;
                 max-height: 88vh;
                 object-fit: contain;
                 border-radius: 12px;
                 box-shadow: 0 32px 80px rgba(0,0,0,0.6);
                 transform: scale(1);
                 transform-origin: center center;
                 transition: transform 0.2s ease;
                 cursor: zoom-in;
                 user-select: none;
                 -webkit-user-drag: none;
             ">
    </div>
</div>

<script>
const lightbox    = document.getElementById('lightbox');
const lightboxImg = document.getElementById('lightbox-img');
let currentScale  = 1;

function openLightbox(src) {
    lightboxImg.src = src;
    lightboxImg.style.transform = 'scale(1)';
    lightboxImg.style.cursor    = 'zoom-in';
    currentScale = 1;
    lightbox.style.display = 'flex';
    document.body.style.overflow = 'hidden';
}

function closeLightbox() {
    lightbox.style.display = 'none';
    document.body.style.overflow = '';
    currentScale = 1;
    lightboxImg.style.transform = 'scale(1)';
}

// Clic sur image = toggle zoom
lightboxImg.addEventListener('click', function(e) {
    e.stopPropagation();
    currentScale = currentScale > 1 ? 1 : 2.5;
    lightboxImg.style.transform = `scale(${currentScale})`;
    lightboxImg.style.cursor    = currentScale > 1 ? 'zoom-out' : 'zoom-in';
});

// Molette = zoom progressif
lightboxImg.addEventListener('wheel', function(e) {
    e.preventDefault();
    currentScale = Math.min(Math.max(currentScale + (e.deltaY < 0 ? 0.2 : -0.2), 1), 5);
    lightboxImg.style.transform = `scale(${currentScale})`;
    lightboxImg.style.cursor    = currentScale > 1 ? 'zoom-out' : 'zoom-in';
}, { passive: false });

// Pinch zoom mobile
let pinchStart = null, scaleStart = 1;
lightboxImg.addEventListener('touchstart', e => {
    if (e.touches.length === 2) {
        pinchStart  = Math.hypot(e.touches[0].clientX - e.touches[1].clientX, e.touches[0].clientY - e.touches[1].clientY);
        scaleStart  = currentScale;
    }
}, { passive: true });

lightboxImg.addEventListener('touchmove', e => {
    if (e.touches.length === 2 && pinchStart) {
        e.preventDefault();
        const dist  = Math.hypot(e.touches[0].clientX - e.touches[1].clientX, e.touches[0].clientY - e.touches[1].clientY);
        currentScale = Math.min(Math.max(scaleStart * (dist / pinchStart), 1), 5);
        lightboxImg.style.transform = `scale(${currentScale})`;
    }
}, { passive: false });

lightboxImg.addEventListener('touchend', () => { pinchStart = null; });

document.addEventListener('keydown', e => { if (e.key === 'Escape') closeLightbox(); });
</script>

<script>
// ── CARROUSEL ──
let currentSlide = 0;
const slides = document.querySelectorAll('.slide');
const dots   = document.querySelectorAll('.dot');
const counter = document.getElementById('slide-current');

function showSlide(n) {
    if (!slides.length) return;
    slides.forEach(s => s.style.display = 'none');
    dots.forEach(d => d.style.background = 'rgba(255,255,255,0.4)');
    currentSlide = (n + slides.length) % slides.length;
    slides[currentSlide].style.display = 'block';
    dots[currentSlide].style.background = 'white';
    if (counter) counter.textContent = currentSlide + 1;
}

function changeSlide(dir) { showSlide(currentSlide + dir); }
function goToSlide(n)     { showSlide(n); }

// Auto-play toutes les 4 secondes
if (slides.length > 1) {
    setInterval(() => changeSlide(1), 4000);
}

// Navigation clavier
document.addEventListener('keydown', e => {
    if (document.getElementById('lightbox')?.style.display === 'flex') return;
    if (e.key === 'ArrowLeft')  changeSlide(-1);
    if (e.key === 'ArrowRight') changeSlide(1);
});
</script>
@endsection
