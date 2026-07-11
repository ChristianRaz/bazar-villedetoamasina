@php
$urgence = \App\Models\Urgence::active()->first();
@endphp

@if($urgence && !empty($urgence->items))
<section class="bg-gradient-to-br from-gray-50 to-white py-12">
    <div class="max-w-3xl mx-auto px-4">
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden border-gray-200">
            <div class="p-6 md:p-8">
                <h2 class="text-3xl md:text-4xl font-extrabold text-[#e8a020] leading-tight">
                    {{ $urgence->titre }} {{-- CORRIGÉ --}}
                </h2>
                <h3 class="text-2xl md:text-3xl font-bold text-[#0a2540]">
                    {{ $urgence->sous_titre }} {{-- CORRIGÉ --}}
                </h3>
                @if($urgence->date_fin) {{-- CORRIGÉ --}}
                    <p class="text-sm font-semibold text-gray-600 mt-1">
                        JUSQU’AU {{ strtoupper($urgence->date_fin->locale('fr')->isoFormat('DD MMMM YYYY')) }}
                    </p>
                @endif
            </div>

            <div class="px-6 md:px-8 pb-8 space-y-4">
                @foreach($urgence->items as $item)
                @if(is_array($item))
                <div class="bg-gray-50 rounded-xl p-4">
                    <p class="font-bold text-[#0a2540]">{{ $item['nom'] ?? '' }}</p>
                    <p class="text-sm text-gray-700 mt-1">📍 {{ $item['adresse'] ?? '' }}</p>
                    <p class="text-sm text-gray-700">📞 {{ implode(' - ', array_column($item['tels'] ?? [], 'tel')) }}</p> {{-- CORRIGÉ --}}
                </div>
                @endif
                @endforeach
            </div>

            @if($urgence->source)
            <div class="bg-gray-100 px-6 py-3 text-center">
                <p class="text-sm text-gray-500">Source : {{ strtoupper($urgence->source) }}</p>
            </div>
            @endif
        </div>
    </div>
</section>
@endif
