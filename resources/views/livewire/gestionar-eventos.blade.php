<div>
    <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
        {{-- Contenedor del Formulario Rediseñado --}}
        <div class="bg-white dark:bg-zinc-800/50 dark:ring-1 dark:ring-white/10 shadow-2xl rounded-xl p-6 sm:p-8 mb-8 border border-zinc-700">
            <h2 class="text-3xl font-bold mb-2 text-gray-900 dark:text-emerald-400">Crear un Nuevo Evento</h2>
            <p class="text-sm text-gray-600 dark:text-gray-400 mb-6">Completa los detalles para publicar un nuevo evento en la plataforma.</p>
            
            <form wire:submit="crearEvento" class="space-y-6">
                
                <div>
                    <label for="titulo" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Título del Evento</label>
                    <input type="text" id="titulo" wire:model.lazy="titulo" placeholder="Ej: Conferencia de Innovación Tecnológica" class="mt-1 block w-full rounded-lg border-2 border-zinc-700/50 shadow-sm px-4 py-2 transition-colors duration-150 ease-in-out dark:bg-zinc-900/50 dark:text-white focus:border-emerald-500 focus:ring focus:ring-emerald-500 focus:ring-opacity-50">
                    @error('titulo') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="descripcion" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Descripción</label>
                    <textarea id="descripcion" wire:model.lazy="descripcion" rows="4" placeholder="Describe los detalles, objetivos y ubicacion del evento..." class="mt-1 block w-full rounded-lg border-2 border-zinc-700/50 shadow-sm px-4 py-2 transition-colors duration-150 ease-in-out dark:bg-zinc-900/50 dark:text-white focus:border-emerald-500 focus:ring focus:ring-emerald-500 focus:ring-opacity-50"></textarea>
                    @error('descripcion') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="relative">
                        <label for="fecha_inicio" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Fecha y Hora de Inicio</label>
                        <input type="datetime-local" id="fecha_inicio" wire:model.lazy="fecha_inicio" class="mt-1 block w-full rounded-lg border-2 border-zinc-700/50 shadow-sm px-4 py-2 transition-colors duration-150 ease-in-out dark:bg-zinc-900/50 dark:text-white focus:border-emerald-500 focus:ring focus:ring-emerald-500 focus:ring-opacity-50">
                        @error('fecha_inicio') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                    </div>
                    <div class="relative">
                        <label for="fecha_fin" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Fecha y Hora de Fin</label>
                        <input type="datetime-local" id="fecha_fin" wire:model.lazy="fecha_fin" class="mt-1 block w-full rounded-lg border-2 border-zinc-700/50 shadow-sm px-4 py-2 transition-colors duration-150 ease-in-out dark:bg-zinc-900/50 dark:text-white focus:border-emerald-500 focus:ring focus:ring-emerald-500 focus:ring-opacity-50">
                        @error('fecha_fin') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                       <label for="max_participantes" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Máximo de Participantes</label>
                       <input type="number" id="max_participantes" wire:model.lazy="max_participantes" placeholder="Ilimitado" class="mt-1 block w-full rounded-lg border-2 border-zinc-700/50 shadow-sm px-4 py-2 transition-colors duration-150 ease-in-out dark:bg-zinc-900/50 dark:text-white focus:border-emerald-500 focus:ring focus:ring-emerald-500 focus:ring-opacity-50">
                       @error('max_participantes') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label for="horas_asignadas" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Horas Acreditadas</label>
                        <input type="number" id="horas_asignadas" wire:model.lazy="horas_asignadas" step="0.01" placeholder="0.00" class="mt-1 block w-full rounded-lg border-2 border-zinc-700/50 shadow-sm px-4 py-2 transition-colors duration-150 ease-in-out dark:bg-zinc-900/50 dark:text-white focus:border-emerald-500 focus:ring focus:ring-emerald-500 focus:ring-opacity-50">
                        @error('horas_asignadas') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                    </div>
                </div>
                
                <div class="pt-4">
                    <button type="submit" class="inline-flex items-center justify-center w-full sm:w-auto px-6 py-3 bg-emerald-600 border border-transparent rounded-lg font-semibold text-white tracking-widest hover:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500 dark:focus:ring-offset-zinc-800 transition-colors">
                        Guardar Evento
                    </button>
                </div>
            </form>
        </div>

        {{-- Contenedor de la Lista Rediseñado --}}
        <div class="bg-white dark:bg-zinc-800/50 dark:ring-1 dark:ring-white/10 shadow-2xl rounded-xl p-6 sm:p-8">
            <h2 class="text-3xl font-bold mb-6 text-gray-900 dark:text-emerald-400">Eventos Publicados</h2>
            <ul class="space-y-2">
                @forelse ($eventos as $evento)
                    <li class="border-b border-zinc-200 dark:border-zinc-700/50 p-4 flex justify-between items-center transition-colors duration-200 ease-in-out">
                        <div>
                            <h3 class="font-semibold text-lg text-gray-800 dark:text-gray-100">{{ $evento->titulo }}</h3>
                            <p class="text-gray-600 dark:text-gray-400 text-sm mt-1">
                                Del {{ \Carbon\Carbon::parse($evento->fecha_inicio)->format('d/m/Y H:i') }}
                                al {{ \Carbon\Carbon::parse($evento->fecha_fin)->format('d/m/Y H:i') }}
                            </p>
                        </div>
                        <button
                            wire:click="eliminarEvento({{ $evento->id }})"
                            wire:confirm="¿Estás seguro de que quieres eliminar este evento?"
                            class="px-3 py-1.5 text-sm bg-red-600 border border-transparent rounded-md font-semibold text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 dark:focus:ring-offset-zinc-800 transition-colors">
                            Eliminar
                        </button>
                    </li>
                @empty
                    <li class="text-center text-gray-500 dark:text-gray-400 py-8">
                        <div class="flex flex-col items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <p class="mt-2">No hay eventos publicados todavía.</p>
                        </div>
                    </li>
                @endforelse
            </ul>
        </div>
    </div>
</div>
