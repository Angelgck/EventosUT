<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class MisRegistros extends Component
{
    public function render()
    {
        // Cambiamos "eventosInscritos()" por el nombre correcto: "eventos()"
        $eventos = Auth::user()->eventos()->orderBy('fecha_inicio', 'desc')->get();

        return view('livewire.mis-registros', [
            'eventos' => $eventos
        ])->layout('components.layouts.app'); 
    }
}