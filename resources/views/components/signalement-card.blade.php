@php use Illuminate\Support\Str; @endphp

<a href="#" class="projet-card" style="background: rgba(10,37,64,0.8); border: 1px solid rgba(33,150,176,0.3); backdrop-filter: blur(10px); text-decoration: none;">
    @if($signalement->photo)
    <div class="projet-img">
        <img src="{{ asset('storage/' . $signalement->photo) }}" alt="{{ $signalement->titre }}">
    </div>
    @endif
    <div class="projet-body">
        <div class="projet-status status-cours">
            <span class="status-dot"></span> {{ ucfirst($signalement->statut ?? 'nouveau') }}
        </div>
        <h3 style="color: var(--blanc);">{{ $signalement->titre }}</h3>
        <p style="color: rgba(248,248,244,0.7);">{{ Str::limit($signalement->description, 120) }}</p>
        <p style="font-size: 11px; color: var(--gris); margin-top: 10px;">📍 {{ $signalement->quartier }}</p>
    </div>
</a>
