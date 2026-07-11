@extends('layouts.app')

@section('content')
<div style="padding-top: 68px; min-height: 100vh; background: var(--sable, #f0ebe0);">

    {{-- Header --}}
    <div style="background: var(--ocean, #0a2540); padding: 60px 5% 40px;">
        <div style="max-width: 900px; margin: 0 auto;">
            <div style="font-family: monospace; font-size: 11px; letter-spacing: 3px;
                        color: var(--gold, #e8a020); text-transform: uppercase; margin-bottom: 10px;">
                Vie de la commune
            </div>
            <h1 style="font-family: 'Playfair Display', serif; font-size: clamp(28px,4vw,42px);
                       font-weight: 700; color: #f8f8f4; line-height: 1.2;">
                Toutes les <span style="color: var(--gold, #e8a020);">actualités</span>
            </h1>
        </div>
    </div>

    {{-- Grille --}}
    <div style="max-width: 900px; margin: 0 auto; padding: 48px 5%;">
        @forelse($actualites as $actu)
        <a href="{{ route('actualites.show', $actu->slug) }}"
           style="display: flex; gap: 24px; background: white; border-radius: 10px;
                  box-shadow: 0 2px 16px rgba(10,37,64,0.08); margin-bottom: 20px;
                  text-decoration: none; color: inherit; overflow: hidden;
                  transition: box-shadow .2s, transform .2s;"
           onmouseover="this.style.transform='translateY(-2px)';this.style.boxShadow='0 8px 32px rgba(10,37,64,0.15)'"
           onmouseout="this.style.transform='';this.style.boxShadow='0 2px 16px rgba(10,37,64,0.08)'">

            {{-- Miniature --}}
            <div style="width: 200px; min-height: 140px; flex-shrink: 0;
                        background: linear-gradient(135deg, #1a4a6e, #2196b0);
                        display: flex; align-items: center; justify-content: center;
                        font-size: 40px; overflow: hidden;">
                @if($actu->video)
                    <video muted style="width:100%;height:100%;object-fit:cover;">
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

            {{-- Contenu --}}
            <div style="padding: 20px; flex: 1;">
                <div style="font-size: 10px; font-weight: 700; letter-spacing: 2px;
                            text-transform: uppercase; color: #2196b0; margin-bottom: 8px;">
                    {{ $actu->categorie }}
                </div>
                <h2 style="font-family: 'Playfair Display', serif; font-size: 18px;
                           font-weight: 700; color: #0a2540; margin-bottom: 8px; line-height: 1.3;">
                    {{ $actu->titre }}
                </h2>
                <p style="font-size: 13px; color: #5a7a8a; line-height: 1.6; margin-bottom: 12px;">
                    {{ Str::limit(strip_tags($actu->contenu), 150) }}
                </p>
                <div style="font-size: 11px; color: #8a9bb0; font-family: monospace;">
                    {{ $actu->date_publication
                        ? \Carbon\Carbon::parse($actu->date_publication)->translatedFormat('d F Y')
                        : $actu->created_at->translatedFormat('d F Y') }}
                </div>
            </div>
        </a>
        @empty
            <div style="text-align: center; padding: 60px; color: #8a9bb0;">
                Aucune actualité pour le moment.
            </div>
        @endforelse

        {{-- Pagination --}}
        <div style="margin-top: 32px;">
            {{ $actualites->links() }}
        </div>
    </div>
</div>
@endsection
