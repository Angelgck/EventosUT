<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function historialEstudiantes()
    {
        // 1. Obtenemos solo los usuarios con rol 'estudiante'
        $estudiantes = User::where('role', 'estudiante')
                            ->with('eventos') // Cargamos la relación con eventos para sumar las horas
                            ->get();

        // 2. Calculamos las horas para cada estudiante
        $estudiantes->each(function ($estudiante) {
            $estudiante->total_horas = $estudiante->eventos->sum('horas_asignadas');
        });

        // 3. Pasamos los datos a la vista
        return view('admin.historial-estudiantes', [
            'estudiantes' => $estudiantes
        ]);
    }
}
