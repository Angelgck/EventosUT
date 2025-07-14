<div>
    <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">

        <div class="bg-white dark:bg-zinc-800 shadow-md rounded-lg p-6 mb-8">
            <h2 class="text-2xl font-bold mb-4">Crea un Evento UTRM</h2>
            <form wire:submit="crearEvento">
                <div class="mb-4">
                    <label for="titulo" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Título</label>
                    <input type="text" id="titulo" wire:model="titulo" class="mt-1 block w-full border-gray-300 dark:border-zinc-700 dark:bg-zinc-900 rounded-md shadow-sm">
                    @error('titulo') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label for="descripcion" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Descripción</label>
                    <textarea id="descripcion" wire:model="descripcion" rows="4" class="mt-1 block w-full border-gray-300 dark:border-zinc-700 dark:bg-zinc-900 rounded-md shadow-sm"></textarea>
                    @error('descripcion') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label for="fecha_inicio" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Fecha de Inicio</label>
                        <input type="datetime-local" id="fecha_inicio" wire:model="fecha_inicio" class="mt-1 block w-full border-gray-300 dark:border-zinc-700 dark:bg-zinc-900 rounded-md shadow-sm">
                        @error('fecha_inicio') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label for="fecha_fin" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Fecha de Fin</label>
                        <input type="datetime-local" id="fecha_fin" wire:model="fecha_fin" class="mt-1 block w-full border-gray-300 dark:border-zinc-700 dark:bg-zinc-900 rounded-md shadow-sm">
                        @error('fecha_fin') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="mb-4">
                   <label for="max_participantes" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Máximo de Participantes (opcional)</label>
                   <input type="number" id="max_participantes" wire:model="max_participantes" placeholder="Dejar en blanco para ilimitado" class="mt-1 block w-full border-gray-300 dark:border-zinc-700 dark:bg-zinc-900 rounded-md shadow-sm">
                  @error('max_participantes') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
                <div class="mb-4">
                    <label for="horas_asignadas" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Horas Asignadas (opcional)</label>
                    <input type="number" id="horas_asignadas" wire:model="horas_asignadas" step="0.01" placeholder="Dejar en blanco para 0" class="mt-1 block w-full border-gray-300 dark:border-zinc-700 dark:bg-zinc-900 rounded-md shadow-sm">
                    @error('horas_asignadas') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <button type="submit" class="bg-blue-600 text-white font-bold py-2 px-4 rounded-md hover:bg-blue-700">
                    Guardar Evento
                </button>
            </form>
        </div>

        <div class="bg-white dark:bg-zinc-800 shadow-md rounded-lg p-6">
            <h2 class="text-2xl font-bold mb-4">Eventos Publicados por la Universidad</h2>
            <ul class="space-y-4">
                @forelse ($eventos as $evento)
                    <li class="border dark:border-zinc-700 p-4 rounded-md flex justify-between items-center">
                        <div>
                            <h3 class="font-bold text-lg">{{ $evento->titulo }}</h3>
                            <p class="text-gray-600 dark:text-gray-400 text-sm">
                                Del {{ \Carbon\Carbon::parse($evento->fecha_inicio)->format('d/m/Y H:i') }}
                                al {{ \Carbon\Carbon::parse($evento->fecha_fin)->format('d/m/Y H:i') }}
                            </p>
                        </div>
                        <button
                            wire:click="eliminarEvento({{ $evento->id }})"
                            wire:confirm="¿Estás seguro de que quieres eliminar este evento?"
                            class="bg-red-600 text-white font-bold py-1 px-3 rounded-md hover:bg-red-700 text-sm">
                            Eliminar
                        </button>
                    </li>
                @empty
                    <li class="text-center text-gray-500 dark:text-gray-400">No hay eventos publicados todavía.</li>
                @endforelse
            </ul>
        </div>

    </div>
</div>