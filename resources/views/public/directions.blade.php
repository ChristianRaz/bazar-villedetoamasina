@extends('layouts.app')

@section('content')
<div class="pt-24 pb-20 bg-gray-50 min-h-screen">
    <div class="container mx-auto px-6">
        <h1 class="text-4xl font-bold text-center mb-16 text-commune-blue animate-on-scroll">
            Toutes nos directions
        </h1>

        @if($directions->count() > 0)
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($directions as $index => $direction)
            <div class="bg-white p-8 shadow-lg hover:shadow-2xl transition duration-300 animate-on-scroll"
                 style="animation-delay: {{ $index * 0.1 }}s">
                @if($direction->image)
                    <img src="{{ Storage::url($direction->image) }}"
                         alt="{{ $direction->nom }}"
                         class="w-full h-48 object-cover rounded mb-4">
                @endif
                <h3 class="text-2xl font-bold mb-4 text-ambatovy-blue">{{ $direction->nom }}</h3>
                <p class="text-gray-600">{{ $direction->description }}</p>
            </div>
            @endforeach
        </div>
        @else
        <p class="text-center text-gray-500 text-xl">Aucune direction disponible.</p>
        @endif
    </div>
</div>
@endsection
