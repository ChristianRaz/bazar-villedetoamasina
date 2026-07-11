@extends('layouts.app')

@section('content')
<article class="min-h-screen bg-white w-full">

    {{-- Hero media --}}
    @if($actualite->video || $actualite->image)
    <div class="w-full bg-slate-900 py-6 flex justify-center">
        <div class="w-full max-w-3xl px-6">
            @if($actualite->video)
                <video controls preload="metadata"
                    poster="{{ $actualite->image ? asset('storage/'.$actualite->image) : '' }}"
                    class="w-full max-h-[420px] object-cover rounded-xl shadow-lg block">
                    <source src="{{ asset('storage/'.$actualite->video) }}" type="video/mp4">
                </video>
            @else
                <img src="{{ asset('storage/'.$actualite->image) }}"
                     alt="{{ $actualite->titre }}"
                     class="w-full max-h-[420px] object-cover rounded-xl shadow-lg block cursor-zoom-in"
                     onclick="openLightbox(this.src)">
            @endif
        </div>
    </div>
    @endif

    {{-- Lightbox --}}
    <div id="lightbox" style="display:none; position:fixed; top:0; left:0; right:0; bottom:0;
         z-index:99999; background:rgba(0,0,0,0.88); backdrop-filter:blur(8px);
         align-items:center; justify-content:center; overflow:hidden;">
        <div onclick="closeLightbox()" style="position:absolute;inset:0;"></div>
        <button onclick="closeLightbox()" style="position:absolute; top:16px; right:20px; z-index:10;
            background:rgba(255,255,255,0.15); border:none; color:white; width:36px; height:36px;
            border-radius:50%; font-size:20px; cursor:pointer; display:flex;
            align-items:center; justify-content:center;">✕</button>
        <div style="position:relative;z-index:5;display:flex;align-items:center;
             justify-content:center;width:100%;height:100%;padding:24px;box-sizing:border-box;">
            <img id="lightbox-img" src="" alt=""
                 style="max-width:88vw; max-height:88vh; object-fit:contain; border-radius:12px;
                        box-shadow:0 32px 80px rgba(0,0,0,0.6); transform:scale(1);
                        transform-origin:center; transition:transform 0.2s ease;
                        cursor:zoom-in; user-select:none;">
        </div>
    </div>

    {{-- Contenu --}}
    <div class="w-full flex justify-center">
        <div class="w-full max-w-3xl px-6 md:px-12 py-10">

            <a href="{{ route('actualites.index') }}"
               class="inline-flex items-center gap-2 text-sm text-gray-400 hover:text-blue-700 transition-colors mb-6">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>
                </svg>
                Retour aux actualités
            </a>

            {{-- Badge catégorie + date --}}
            <div class="flex items-center gap-3 mb-4">
                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold
                             bg-blue-100 text-blue-800 uppercase tracking-widest">
                    {{ $actualite->categorie }}
                </span>
                <span class="text-sm text-gray-400">
                    {{ $actualite->date_publication
                        ? \Carbon\Carbon::parse($actualite->date_publication)->translatedFormat('d F Y')
                        : $actualite->created_at->translatedFormat('d F Y') }}
                </span>
            </div>

            <h1 class="text-3xl md:text-4xl font-bold text-gray-900 leading-tight mb-2 text-center">
                {{ $actualite->titre }}
            </h1>
            <div class="w-16 h-1 bg-yellow-400 rounded-full mb-10 mx-auto"></div>

            {{-- Contenu --}}
            <div class="prose prose-lg prose-slate max-w-none
                        prose-p:text-gray-600 prose-p:leading-relaxed prose-p:mb-4
                        prose-headings:text-gray-900 prose-strong:text-gray-800
                        prose-a:text-blue-600 prose-a:no-underline hover:prose-a:underline">
                {!! $actualite->contenu !!}
            </div>

        </div>
    </div>
</article>

<script>
const lightbox    = document.getElementById('lightbox');
const lightboxImg = document.getElementById('lightbox-img');
let currentScale  = 1;

function openLightbox(src) {
    lightboxImg.src = src;
    lightboxImg.style.transform = 'scale(1)';
    currentScale = 1;
    lightbox.style.display = 'flex';
    document.body.style.overflow = 'hidden';
}
function closeLightbox() {
    lightbox.style.display = 'none';
    document.body.style.overflow = '';
}
lightboxImg.addEventListener('click', e => {
    e.stopPropagation();
    currentScale = currentScale > 1 ? 1 : 2.5;
    lightboxImg.style.transform = `scale(${currentScale})`;
    lightboxImg.style.cursor = currentScale > 1 ? 'zoom-out' : 'zoom-in';
});
lightboxImg.addEventListener('wheel', e => {
    e.preventDefault();
    currentScale = Math.min(Math.max(currentScale + (e.deltaY < 0 ? 0.2 : -0.2), 1), 5);
    lightboxImg.style.transform = `scale(${currentScale})`;
}, { passive: false });
document.addEventListener('keydown', e => { if (e.key === 'Escape') closeLightbox(); });
</script>
@endsection
