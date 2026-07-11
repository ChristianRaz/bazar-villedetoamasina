@php use Illuminate\Support\Str; @endphp
@extends('layouts.app')

@section('content')
</br></br></br></br></br></br>
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-8">Projets de la Commune Urbaine de Toamasina</h1>

    @if($projets->count() > 0)
        <div class="grid md:grid-cols-3 gap-6">
            @foreach($projets as $projet)
                <div class="border rounded-lg overflow-hidden shadow hover:shadow-lg">

                    {{-- Image ou Vidéo --}}
                    @if($projet->video)
                        <video controls preload="metadata" class="w-full h-56 object-cover bg-black">
                            <source src="{{ asset('storage/' . $projet->video) }}" type="video/mp4">
                        </video>
                    @elseif($projet->image)
                        <img src="{{ asset('storage/' . $projet->image) }}" class="w-full h-56 object-cover">
                    @else
                        <div class="w-full h-56 bg-gray-200 flex items-center justify-center">
                            Pas d'image
                        </div>
                    @endif

                    <div class="p-4">
                        <h3 class="font-bold text-xl mb-2">{{ $projet->titre }}</h3>
                        <p class="text-gray-600 mb-4">{{ Str::limit(strip_tags($projet->description), 100) }}</p>

                        {{-- Barre progression --}}
                        <div class="mb-2">
                            <div class="flex justify-between text-sm">
                                <span>Avancement</span>
                                <span>{{ $projet->progression }}%</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2">
                                <div class="bg-blue-600 h-2 rounded-full" style="width: {{ $projet->progression }}%"></div>
                            </div>
                        </div>

                        <span class="text-sm px-2 py-1 rounded {{ $projet->statut == 'Terminé' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                            {{ $projet->statut }}
                        </span>

                        <a href="{{ route('projets.show', $projet->slug) }}" class="block mt-4 text-blue-600 hover:underline">
                            Voir détails →
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-8">
            {{ $projets->links() }}
        </div>
    @else
        <p>Aucun projet pour le moment.</p>
    @endif
</div>
@endsection
