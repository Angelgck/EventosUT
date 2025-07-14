<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Mis Registros') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                @forelse ($eventos as $evento)
                    <div class="bg-white dark:bg-zinc-800 overflow-hidden shadow-lg rounded-lg p-6 flex flex-col justify-between">
                        <div>
                            <h3 class="text-lg font-bold text-gray-900 dark:text-white">{{ $evento->titulo }}</h3>
                            <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">{{ Str::limit($evento->descripcion, 150) }}</p>

                            <div class="mt-4 text-xs text-gray-500 dark:text-gray-300 space-y-1">
                                <p><strong>Inicia:</strong> {{ \Carbon\Carbon::parse($evento->fecha_inicio)->format('d/m/Y H:i') }}</p>
                                <p><strong>Termina:</strong> {{ \Carbon\Carbon::parse($evento->fecha_fin)->format('d/m/Y H:i') }}</p>
                                @if($evento->horas_asignadas > 0)
                                    <p><strong>Horas que otorga:</strong> {{ $evento->horas_asignadas }}</p>
                                @endif
                            </div>
                        </div>

                        <div class="mt-6">
                            <div class="flex justify-between items-center text-sm font-semibold">
                                <p class="text-gray-700 dark:text-gray-200">Participantes:</p>
                                <span class="px-2 py-1 bg-blue-200 text-blue-800 rounded-full">
                                    {{ $evento->participantes()->count() }} / {{ $evento->max_participantes ?? '∞' }}
                                </span>
                            </div>

                            <a href="#" class="mt-4 block w-full text-center bg-red-600 text-white font-bold py-2 px-4 rounded-md hover:bg-red-700">
                                Cancelar Registro
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-3 text-center text-gray-500 dark:text-gray-400 py-10">
                        <p>No te has registrado a ningún evento todavía.</p>
                        <a href="{{ route('dashboard') }}" class="mt-4 inline-block text-blue-500 hover:underline" wire:navigate>
                            Ver eventos disponibles
                        </a>
                    </div>
                @endforelse

            </div>
        </div>
    </div>
</div>