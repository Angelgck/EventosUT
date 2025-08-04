<div>
    <div name="header">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <div>
                <h2 class="text-3xl font-bold text-gray-900 dark:text-emerald-400 leading-tight">
                    {{ __('Mi Perfil de Estudiante') }}
                </h2>
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    Aquí puedes ver tu progreso y el historial de tus actividades.
                </p>
            </div>
            {{-- CAMBIO: Botón con el estilo verde del tema --}}
            <a href="{{ route('settings.password') }}" class="inline-flex items-center px-4 py-2 bg-emerald-600 border border-transparent rounded-lg font-semibold text-sm text-white hover:bg-emerald-700 transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500 dark:focus:ring-offset-zinc-800">
                Cambiar Contraseña
            </a>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 grid grid-cols-1 lg:grid-cols-3 gap-8">

            {{-- Columna Izquierda: Información Personal y Resumen --}}
            <div class="lg:col-span-1 space-y-8">
                {{-- CAMBIO: Tarjeta de Información Personal rediseñada --}}
                <div class="p-6 bg-white dark:bg-zinc-800/50 dark:ring-1 dark:ring-white/10 shadow-2xl sm:rounded-xl">
                    <h3 class="text-xl font-bold text-gray-900 dark:text-emerald-400 mb-4">Información Personal</h3>
                    <dl class="space-y-4 text-sm text-gray-600 dark:text-gray-300">
                        <div class="flex items-center gap-3">
                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" /></svg>
                            <dt class="font-semibold text-gray-800 dark:text-gray-200">Nombre:</dt>
                            <dd class="text-gray-600 dark:text-gray-400">{{ $usuario->name }}</dd>
                        </div>
                        <div class="flex items-center gap-3">
                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" /><path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" /></svg>
                            <dt class="font-semibold text-gray-800 dark:text-gray-200">Correo:</dt>
                            <dd class="text-gray-600 dark:text-gray-400">{{ $usuario->email }}</dd>
                        </div>
                        <div class="flex items-center gap-3">
                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path d="M3.5 3A1.5 1.5 0 002 4.5v11A1.5 1.5 0 003.5 17h13a1.5 1.5 0 001.5-1.5v-11A1.5 1.5 0 0016.5 3h-13zM10 12a1 1 0 100-2 1 1 0 000 2zM3 5.5a.5.5 0 01.5-.5h13a.5.5 0 010 1h-13a.5.5 0 01-.5-.5z" /></svg>
                            <dt class="font-semibold text-gray-800 dark:text-gray-200">Carrera:</dt>
                            <dd class="text-gray-600 dark:text-gray-400">{{ $usuario->carrera ?? 'No asignada' }}</dd>
                        </div>
                        <div class="flex items-center gap-3">
                           <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 2a.75.75 0 01.75.75v3.546l2.94-2.13a.75.75 0 11.92 1.188l-3.866 2.8a.75.75 0 01-.92 0L6.34 5.204a.75.75 0 11.92-1.188L10 6.046V2.75A.75.75 0 0110 2zM5.385 7.61a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.06 0l2.25-2.25a.75.75 0 00-1.06-1.06L10 8.88l-1.28-1.27zM2 13.5a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 13.5z" clip-rule="evenodd" /></svg>
                            <dt class="font-semibold text-gray-800 dark:text-gray-200">Grupo:</dt>
                            <dd class="text-gray-600 dark:text-gray-400">{{ $usuario->grupo ?? 'No asignado' }}</dd>
                        </div>
                    </dl>
                </div>
                
                {{-- CAMBIO: Tarjeta de Resumen rediseñada para mayor impacto --}}
                <div class="p-6 bg-white dark:bg-zinc-800/50 dark:ring-1 dark:ring-white/10 shadow-2xl sm:rounded-xl text-center">
                    <h3 class="text-xl font-bold text-gray-900 dark:text-emerald-400">Resumen de Actividades</h3>
                    <p class="text-gray-600 dark:text-gray-400 mt-2 text-sm">Total de horas acumuladas:</p>
                    {{-- CAMBIO: Contador de horas con color del tema y más grande --}}
                    <p class="text-6xl font-bold text-emerald-500 mt-2">{{ number_format($totalHoras, 2) }}</p>
                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">horas</p>
                </div>
            </div>

            {{-- Columna Derecha: Historial de Eventos --}}
            <div class="lg:col-span-2">
                <div class="p-6 bg-white dark:bg-zinc-800/50 dark:ring-1 dark:ring-white/10 shadow-2xl sm:rounded-xl">
                    <h3 class="text-xl font-bold text-gray-900 dark:text-emerald-400 mb-4">Historial de Eventos Participados</h3>
                    <div class="mt-4 flow-root">
                        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                                {{-- CAMBIO: Tabla con estilo profesional --}}
                                <table class="min-w-full divide-y divide-zinc-200 dark:divide-zinc-700">
                                    <thead class="bg-zinc-50 dark:bg-zinc-900/50">
                                        <tr>
                                            <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 dark:text-white sm:pl-3">Nombre del Evento</th>
                                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-white">Fecha</th>
                                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-white">Horas Otorgadas</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-zinc-200 dark:divide-zinc-800">
                                        @forelse ($eventos as $evento)
                                            <tr class="hover:bg-zinc-100 dark:hover:bg-zinc-700/50 transition-colors">
                                                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 dark:text-white sm:pl-3">{{ $evento->titulo }}</td>
                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 dark:text-gray-400">{{ \Carbon\Carbon::parse($evento->fecha_inicio)->format('d/m/Y') }}</td>
                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 dark:text-gray-400">{{ number_format($evento->horas_asignadas, 2) }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="3" class="text-center py-10 text-sm text-gray-500 dark:text-gray-400">
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
</div>