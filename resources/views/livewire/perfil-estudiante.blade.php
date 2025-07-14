<div>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Mi Perfil de Estudiante') }}
            </h2>
            <a href="{{ route('settings.password') }}" class="text-sm font-semibold bg-zinc-700 text-white py-2 px-4 rounded-lg hover:bg-zinc-600">
                Cambiar Contraseña
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <div class="p-4 sm:p-8 bg-white dark:bg-zinc-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">Información Personal</h3>
                    <div class="mt-4 space-y-2 text-sm text-gray-600 dark:text-gray-400">
                        <p><strong class="font-semibold text-gray-800 dark:text-gray-200">Nombre:</strong> {{ $usuario->name }}</p>
                        <p><strong class="font-semibold text-gray-800 dark:text-gray-200">Correo:</strong> {{ $usuario->email }}</p>
                        <p><strong class="font-semibold text-gray-800 dark:text-gray-200">Carrera:</strong> {{ $usuario->carrera ?? 'No asignada' }}</p>
                        <p><strong class="font-semibold text-gray-800 dark:text-gray-200">Grupo:</strong> {{ $usuario->grupo ?? 'No asignado' }}</p>
                    </div>
                </div>
            </div>
            
            <div class="p-4 sm:p-8 bg-white dark:bg-zinc-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">Resumen de Actividades</h3>
                    <div class="mt-4 text-sm">
                        <p class="text-gray-600 dark:text-gray-400">Total de horas acumuladas por participación en eventos:</p>
                        <p class="text-3xl font-bold text-blue-600 dark:text-blue-400">{{ number_format($totalHoras, 2) }} horas</p>
                    </div>
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-zinc-800 shadow sm:rounded-lg">
                <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">Historial de Eventos Participados</h3>
                <div class="mt-4 flow-root">
                    <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                            <table class="min-w-full divide-y divide-gray-300 dark:divide-zinc-700">
                                <thead>
                                    <tr>
                                        <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 dark:text-white sm:pl-0">Nombre del Evento</th>
                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-white">Fecha</th>
                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-white">Horas Otorgadas</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 dark:divide-zinc-800">
                                    @forelse ($eventos as $evento)
                                        <tr>
                                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 dark:text-white sm:pl-0">{{ $evento->titulo }}</td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 dark:text-gray-400">{{ \Carbon\Carbon::parse($evento->fecha_inicio)->format('d/m/Y') }}</td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 dark:text-gray-400">{{ number_format($evento->horas_asignadas, 2) }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" class="text-center py-4 text-sm text-gray-500 dark:text-gray-400">
                                                No has participado en ningún evento.
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>