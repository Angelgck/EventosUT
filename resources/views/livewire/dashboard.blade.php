<div>
    <div name="header">
        <h2 class="text-3xl font-bold text-gray-900 dark:text-emerald-400 leading-tight">
            {{ __('Eventos Disponibles en Universidad Tecnologica de la Riviera Maya') }}
        </h2>
        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            Explora y participa en las próximas actividades de la universidad.
        </p>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

                @forelse ($eventos as $evento)
                    {{-- Tarjeta de Evento Rediseñada --}}
                    <div class="bg-white dark:bg-zinc-800/50 dark:ring-1 dark:ring-white/10 overflow-hidden shadow-2xl rounded-xl p-6 flex flex-col justify-between transition-transform duration-300 ease-in-out hover:scale-[1.02] hover:shadow-emerald-500/20">
                        <div>
                            <h3 class="text-xl font-bold text-gray-900 dark:text-emerald-400">{{ $evento->titulo }}</h3>
                            <p class="mt-2 text-sm text-gray-600 dark:text-gray-400 leading-relaxed h-20">{{ Str::limit($evento->descripcion, 140) }}</p>
                            
                            <div class="mt-4 pt-4 border-t border-zinc-200 dark:border-zinc-700/50 text-sm text-gray-500 dark:text-gray-300 space-y-3">
                                <p class="flex items-center gap-2">
                                    <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0h18" /></svg>
                                    <span>{{ \Carbon\Carbon::parse($evento->fecha_inicio)->format('d/m/Y H:i') }} - {{ \Carbon\Carbon::parse($evento->fecha_fin)->format('H:i') }}</span>
                                </p>
                                @if($evento->horas_asignadas > 0)
                                    <p class="flex items-center gap-2">
                                        <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                        <strong>{{ $evento->horas_asignadas }} horas acreditadas</strong>
                                    </p>
                                @endif
                            </div>
                        </div>

                        <div class="mt-6">
                            <div class="flex justify-between items-center text-sm font-semibold">
                                <p class="text-gray-700 dark:text-gray-300">Participantes:</p>
                                <span class="px-2.5 py-1 bg-emerald-100 text-emerald-800 dark:bg-emerald-900 dark:text-emerald-200 text-xs font-bold rounded-full">
                                    {{ $evento->participantes_count }} / {{ $evento->max_participantes ?? '∞' }}
                                </span>
                            </div>

                            @php
                                $isFull = $evento->max_participantes && $evento->participantes_count >= $evento->max_participantes;
                            @endphp

                            @if (in_array($evento->id, $eventosInscritosIds))
                                <button wire:click="cancelarRegistro({{ $evento->id }})" class="mt-4 w-full px-4 py-2 bg-red-600 border border-transparent rounded-lg font-semibold text-sm text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 dark:focus:ring-offset-zinc-800 transition-colors">
                                    Cancelar Registro
                                </button>
                            @else
                                <button wire:click="registrar({{ $evento->id }})" 
                                        @disabled($isFull)
                                        class="mt-4 w-full px-4 py-2 border border-transparent rounded-lg font-semibold text-sm text-white transition-colors
                                               {{ $isFull ? 'bg-zinc-500 cursor-not-allowed' : 'bg-emerald-600 hover:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500 dark:focus:ring-offset-zinc-800' }}">
                                    {{ $isFull ? 'Evento Lleno' : 'Registrarme' }}
                                </button>
                            @endif
                        </div>
                    </div>
                @empty
                    <div class="col-span-1 md:col-span-2 lg:col-span-3 text-center text-gray-500 dark:text-gray-400 py-16 px-6 bg-white dark:bg-zinc-800/50 dark:ring-1 dark:ring-white/10 shadow-xl rounded-xl">
                         <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 9.75h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5m-16.5-12h16.5m-16.5-4.5h16.5" />
                        </svg>
                        <h3 class="mt-2 text-lg font-semibold text-gray-900 dark:text-white">No hay eventos nuevos</h3>
                        <p class="mt-1 text-sm text-gray-500">Por favor, vuelve a consultar más tarde para ver nuevas actividades.</p>
                    </div>
                @endforelse

            </div>
        </div>
    </div>
</div>