<x-layouts.app>
    <div name="header" class="dark:bg-black-900 py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-gray-900 dark:text-emerald-600 leading-tight">
                Historial de Estudiantes
            </h2>
            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                Aquí puedes ver el historial de estudiantes y sus horas acumuladas.
            </p>
        </div>
    </div>

    <div class="py-12 dark:bg-black-900 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-zinc-800 rounded-2xl overflow-hidden shadow-2xl">
                <div class="p-8 text-gray-100">
                    <div class="overflow-x-auto rounded-lg">
                        <table class="min-w-full divide-y divide-zinc-700">
                            <thead class="bg-emerald-600 rounded-lg">
                                <tr>
                                    <th scope="col" class="px-6 py-4 text-left text-sm font-bold text-gray-100 uppercase tracking-wider">
                                        Nombre
                                    </th>
                                    <th scope="col" class="px-6 py-4 text-left text-sm font-bold text-gray-100 uppercase tracking-wider">
                                        Carrera
                                    </th>
                                    <th scope="col" class="px-6 py-4 text-left text-sm font-bold text-gray-100 uppercase tracking-wider">
                                        Grupo
                                    </th>
                                    <th scope="col" class="px-6 py-4 text-left text-sm font-bold text-gray-100 uppercase tracking-wider">
                                        Horas Acumuladas
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-zinc-800 divide-y divide-zinc-700">
                                @forelse ($estudiantes as $estudiante)
                                    <tr class="transition-colors duration-200 ease-in-out hover:bg-zinc-700">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-200">
                                            {{ $estudiante->name }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-200">
                                            {{ $estudiante->carrera ?? 'No asignada' }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-200">
                                            {{ $estudiante->grupo ?? 'No asignado' }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-200">
                                            {{ number_format($estudiante->total_horas, 2) }} horas
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="px-6 py-4 text-center text-sm text-gray-400 italic">
                                            No hay estudiantes registrados.
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
</x-layouts.app>
