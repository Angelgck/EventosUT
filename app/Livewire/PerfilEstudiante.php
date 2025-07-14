<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PerfilEstudiante extends Component
{
    public function render()
    {
        $user = Auth::user();

        // Obtenemos los eventos a los que el usuario está inscrito
        $eventos = $user->eventosInscritos()->orderBy('fecha_inicio', 'desc')->get();

        // Calculamos el total de horas sumando la columna 'horas_asignadas' de los eventos
        $totalHoras = $eventos->sum('horas_asignadas');

        return view('livewire.perfil-estudiante', [
            'usuario' => $user,
            'eventos' => $eventos,
            'totalHoras' => $totalHoras,
        ])->layout('components.layouts.app');
    }
}