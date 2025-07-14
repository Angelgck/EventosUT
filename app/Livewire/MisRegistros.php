<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class MisRegistros extends Component
{
    public function render()
    {
        $eventos = Auth::user()->eventosInscritos()->orderBy('fecha_inicio', 'desc')->get();

        return view('livewire.mis-registros', [
            'eventos' => $eventos
        ])->layout('components.layouts.app'); 
    }
}
