<x-layout>
    <div class="container mx-auto px-4 py-10">
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between p-6 bg-gradient-to-r from-blue-600 to-violet-600 text-white">
                <div class="flex items-start gap-4">
                    <a href="{{ url()->previous() }}" class="inline-flex items-center justify-center w-10 h-10 rounded-md bg-white/20 hover:bg-white/30">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                    </a>
                    <div>
                        <h1 class="text-2xl md:text-3xl font-bold">Rastreamento de Encomenda</h1>
                        <p class="text-sm md:text-base text-white/90 mt-1">Código: <span class="font-semibold">{{ $frete->codigo_rastreio }}</span></p>
                    </div>
                </div>

                <div class="mt-4 md:mt-0 flex items-center gap-4">
                    <div class="text-right">
                        <div class="text-sm text-white/90">Status</div>
                        <div class="mt-1">
                            <span class="inline-block px-3 py-1 rounded-full text-sm font-medium {{ $frete->status->pegarCorEtiqueta() }}">{{ $frete->status }}</span>
                        </div>
                    </div>
                    <div class="text-right">
                        <div class="text-sm text-white/90">Destino</div>
                        <div class="mt-1 font-semibold">{{ $frete->destino }}</div>
                    </div>
                </div>
            </div>

            <div class="p-6 md:p-8 grid grid-cols-1 lg:grid-cols-3 gap-6">
                <aside class="lg:col-span-1 bg-gray-50 rounded-lg p-4">
                    <h3 class="text-sm font-semibold text-gray-700">Detalhes da Encomenda</h3>
                    <dl class="mt-3 text-sm text-gray-600 space-y-2">
                        <div>
                            <dt class="font-medium text-gray-800">Código</dt>
                            <dd>{{ $frete->codigo_rastreio }}</dd>
                        </div>
                        <div>
                            <dt class="font-medium text-gray-800">Destino</dt>
                            <dd>{{ $frete->destino }}</dd>
                        </div>
                        @if(isset($frete->origem))
                        <div>
                            <dt class="font-medium text-gray-800">Origem</dt>
                            <dd>{{ $frete->origem }}</dd>
                        </div>
                        @endif
                    </dl>
                    <div class="mt-4 flex gap-2">
                        <a href="#" onclick="window.print();return false;" class="inline-block px-3 py-2 text-sm bg-indigo-600 text-white rounded">Imprimir</a>
                        <a href="{{ url()->previous() }}" class="inline-block px-3 py-2 text-sm bg-white border rounded text-gray-700">Voltar</a>
                    </div>
                </aside>

                <div class="lg:col-span-2">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Linha do tempo</h3>
                    <div class="relative">
                        <div class="border-l-2 border-gray-200 absolute left-4 top-0 bottom-0 hidden md:block"></div>
                        <div class="space-y-6">
                            @php
                                $etapas = $frete->etapas instanceof Illuminate\Support\Collection ? $frete->etapas->sortByDesc('created_at') : collect($frete->etapas);
                            @endphp
                            @foreach($etapas as $etapa)
                                <div class="flex items-start md:items-center gap-4">
                                    <div class="relative">
                                        <div class="flex items-center justify-center w-8 h-8 rounded-full bg-indigo-600 text-white"> 
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                        </div>
                                    </div>
                                    <div class="flex-1">
                                        <div class="flex items-center justify-between">
                                            <p class="text-sm font-medium text-gray-800">{{ $etapa->description }}</p>
                                            <time class="text-xs text-gray-500">{{ \Illuminate\Support\Carbon::parse($etapa->created_at)->format('d/m/Y H:i') }}</time>
                                        </div>
                                        @if(isset($etapa->local))
                                            <p class="text-sm text-gray-500 mt-1">Local: {{ $etapa->local }}</p>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
