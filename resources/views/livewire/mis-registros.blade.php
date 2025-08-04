<div>
    <div name="header">
        <h2 class="text-3xl font-bold text-gray-900 dark:text-emerald-400 leading-tight">
            {{ __('Mis Registros UTRM') }}
        </h2>
        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            Aquí están todos los eventos en los que te has inscrito.
        </p>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

                @forelse ($eventos as $evento)
                    {{-- CAMBIO: Tarjeta de evento rediseñada con efectos y mejor estructura --}}
                    <div class="bg-white dark:bg-zinc-800/50 dark:ring-1 dark:ring-white/10 overflow-hidden shadow-2xl rounded-xl p-6 flex flex-col justify-between transition-transform duration-300 ease-in-out hover:scale-[1.02]">
                        <div>
                            <h3 class="text-xl font-bold text-gray-900 dark:text-emerald-400">{{ $evento->titulo }}</h3>
                            <p class="mt-2 text-sm text-gray-600 dark:text-gray-400 leading-relaxed">{{ Str::limit($evento->descripcion, 140) }}</p>

                            {{-- CAMBIO: Bloque de información con iconos para mayor claridad --}}
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
                                {{-- CAMBIO: "Píldora" de participantes con el tema verde --}}
                                <span class="px-2.5 py-1 bg-emerald-100 text-emerald-800 dark:bg-emerald-900 dark:text-emerald-200 text-xs font-bold rounded-full">
                                    {{ $evento->participantes()->count() }} / {{ $evento->max_participantes ?? '∞' }}
                                </span>
                            </div>

                            {{-- CAMBIO: Botón de "Cancelar" con estilo profesional y consistente --}}
                            <button wire:click="cancelarRegistro({{ $evento->id }})" class="mt-4 w-full px-4 py-2 bg-red-600 border border-transparent rounded-lg font-semibold text-sm text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 dark:focus:ring-offset-zinc-800 transition-colors">
                                Cancelar Registro
                            </button>
                        </div>
                    </div>
                @empty
                    {{-- CAMBIO: Mensaje de "vacío" rediseñado para ser más visual y útil --}}
                    <div class="col-span-1 md:col-span-2 lg:col-span-3 text-center text-gray-500 dark:text-gray-400 py-16 px-6 bg-white dark:bg-zinc-800/50 dark:ring-1 dark:ring-white/10 shadow-xl rounded-xl">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        <h3 class="mt-2 text-lg font-semibold text-gray-900 dark:text-white">Aún no tienes registros</h3>
                        <p class="mt-1 text-sm text-gray-500">Parece que no te has inscrito a ningún evento. ¡Explora las oportunidades disponibles!</p>
                        <div class="mt-6">
                            <a href="{{ route('dashboard') }}" class="inline-flex items-center px-4 py-2 bg-emerald-600 border border-transparent rounded-lg font-semibold text-sm text-white hover:bg-emerald-700 transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500 dark:focus:ring-offset-zinc-800" wire:navigate>
                                Ver eventos disponibles
                            </a>
                        </div>
                    </div>
                @endforelse

            </div>
        </div>
    </div>
</div>